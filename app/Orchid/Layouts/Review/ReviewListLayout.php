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

class ReviewListLayout extends Table
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
            TD::make('id', __('Property Id')),

            TD::make('propertyName.name', __('Property Name')),

            TD::make('property_id', __('Sub Property Name')),

            TD::make('postedUser.name', __('Posted User Name')),

            TD::make('review_date', __('Review Date'))
                ->usingComponent(DateTimeSplit::class),

            TD::make('status', __('Display Status'))
                ->render(function (Reviews $reviews){
                    return config('constants.ReviewStatus')[$reviews->status] ;
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
                                ->asyncParameters([
                                    'review'=>$reviews->id
                                ]),

                            ModalToggle::make('View Reply')
                                ->canSee($reviews->reply_text != null)
                                ->modal('Reply')
                                ->asyncParameters([
                                    'review'=>$reviews->id
                                ]),

                            ModalToggle::make('Send Reply')
                                ->modal('Send Reply')
                                ->canSee($reviews->reply_text == null && $user->hasAnyAccess(['review.reply.permissions']))
                                ->method('SendReply', [
                                    'id' => $reviews->id,
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


