<?php

namespace App\Orchid\Layouts\Review;

use App\Models\Properties;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class GuestReviewListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'reviews';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            TD::make('id', __('Review Id')),

            TD::make('guesrUser.id', __('Guest User Id ')),

            TD::make('guesrUser.name', __('Guest User Name')),

            TD::make('postedUser.name', __('Posted User Name')),

            TD::make('review_date', __('Review Date'))
                ->usingComponent(DateTimeSplit::class),

            TD::make('publish_date', __('Publish Date'))
                ->usingComponent(DateTimeSplit::class),

            TD::make('status', __('Display Status'))
                ->render(function (Reviews $reviews){
                    return config('constants.ReviewStatus')[$reviews->status];
                })
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Reviews $reviews) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                            ModalToggle::make('View Review')
                                ->modal('Review')
                                ->canSee($reviews->status == 1)
                                ->asyncParameters([
                                    'review'=>$reviews->id
                                ]),


                        ModalToggle::make('Send Property Review')
                            ->modal('Send Property Review')
                            ->canSee($reviews->status == 0 && $user->role == 'user')
                            ->method('SendPropertyReview', [
                                'booking_id' => $reviews->booking_id,
                                'property_id' => $reviews->property_id,
                                'sub_property_id' => $reviews->sub_property_id,
                            ]),

                            Button::make(__('Show On WebSite'))
                                ->canSee($user->hasAnyAccess(['review.show.hidden.permissions']))
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->method('ChangeStatus', [
                                    'id' => $reviews->id,
                                    'status' => 1,
                                ]),

                            Button::make(__('Hidden On WebSite'))
                                ->canSee( $user->hasAnyAccess(['review.show.hidden.permissions']))
                                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                ->method('ChangeStatus', [
                                    'id' => $reviews->id,
                                    'status' => 2,
                                ]),

                    ])),

        ];
    }
}


