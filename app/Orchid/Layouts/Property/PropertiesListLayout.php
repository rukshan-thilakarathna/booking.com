<?php

namespace App\Orchid\Layouts\Property;

use App\Models\Properties;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PropertiesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'properties';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            TD::make('id', __('Property Id'))
                ->filter()
                ->sort(),

            TD::make('propertyType.name', __('Property Type')),


            TD::make('name', __('Property Name'))
                ->filter()
                ->sort(),


            TD::make('email', __('Property Email'))
                ->filter()
                ->sort(),


            TD::make('contact_number', __('Property Contact Number'))
                ->filter()
                ->sort(),

            TD::make('open_for_booking', __('Open For Booking'))
                ->render(function (Properties $properties){
                    return config('constants.OpenForBooking')[$properties->open_for_booking] ;
                })
                ->sort(),

            TD::make('status', __('status'))
                ->render(function (Properties $properties){
                    return config('constants.PropertyStatus')[$properties->status] ;
                })
                ->sort(),


            TD::make('created_at', __('Created At'))
                ->usingComponent(DateTimeSplit::class)
                ->sort()
                ->defaultHidden(),


            TD::make('updated_at', __('Updateda'))
                ->usingComponent(DateTimeSplit::class)
                ->sort()
                ->defaultHidden(),


            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Properties $properties) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->canSee($user->hasAnyAccess(['property.edite.permissions']))
                            ->route('property.edit', $properties->id),


                        ModalToggle::make('View')
                            ->canSee($user->hasAnyAccess(['property.view.permissions']))
                            ->modal('View Property')
                            ->asyncParameters([
                                'property'=>$properties->id
                            ]),

                        Button::make(__('Delete'))
                            ->canSee($user->hasAnyAccess(['property.delete.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $properties->id,
                            ]),

                        Button::make(__('Approve this property'))
                            ->canSee($properties->status == 2 && $user->hasAnyAccess(['property.approve.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('actve', [
                                'id' => $properties->id,
                            ]),

                        ModalToggle::make('Change Open For Booking ')
                            ->modal('Open For Booking')
                            ->canSee($user->role =='property-owner' && $properties->type != 1)
                            ->method('OpenForBooking', [
                                'id' => $properties->id,
                            ]),

                        ModalToggle::make('Create Room Type')
                            ->modal('Create Room Type')
                            ->canSee($properties->type == 1)
                            ->method('CreateRoomType', [
                                'id' => $properties->id,
                            ]),

                        ModalToggle::make('Create Full Property Room Type')
                            ->modal('Create Full Property Room Type')
                            ->canSee($properties->type != 1)
                            ->method('CreateRoomType', [
                                'id' => $properties->id,
                            ]),

                        Button::make(__('Suspend this property'))
                            ->canSee($properties->status == 4 && $user->hasAnyAccess(['property.suspend.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('suspend', [
                                'id' => $properties->id,
                            ]),

                        Button::make(__('Remove Suspend this property'))
                            ->canSee(($properties->status == 4) && $user->hasAnyAccess(['property.suspend.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('actve', [
                                'id' => $properties->id,
                            ]),

                        Button::make(__('Hold this property'))
                            ->canSee($properties->status == 1 && $user->hasAnyAccess(['property.status.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('hold', [
                                'id' => $properties->id,
                            ]),

                        Button::make(__('Release this property'))
                            ->canSee($properties->status == 3 && $user->hasAnyAccess(['property.status.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('actve', [
                                'id' => $properties->id,
                            ]),
                    ])),
        ];
    }
}
