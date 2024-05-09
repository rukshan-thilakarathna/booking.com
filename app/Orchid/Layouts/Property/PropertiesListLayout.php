<?php

namespace App\Orchid\Layouts\Property;

use App\Models\Properties;
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
        return [
            TD::make('id', __('Property Id'))
                ->filter()
                ->sort(),


            TD::make('name', __('Property Name'))
                ->filter()
                ->sort(),


            TD::make('email', __('Property Email'))
                ->filter()
                ->sort(),


            TD::make('contact_number', __('Property Contact Number'))
                ->filter()
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
                            ->route('property.edit', $properties->id)
                            ->icon('bs.pencil'),

                        ModalToggle::make('View')
                            ->modal('View User')
                            ->method('action')
                            ->icon('bs.eye')
                            ->asyncParameters([
                                'user'=>$properties->id
                            ]),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $properties->id,
                            ]),
                    ])),
        ];
    }
}
