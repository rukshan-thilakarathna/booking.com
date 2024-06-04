<?php

namespace App\Orchid\Screens\Review;

use App\Models\Reviews;
use App\Orchid\Layouts\Review\ReviewListLayout;
use Illuminate\Http\Request;
use Orchid\Platform\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ReviewListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $review = Reviews::with('propertyName','postedUser')->defaultSort('id', 'desc')->paginate(12);
        return [
            'reviews' => $review
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Review Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    public function permission(): ?iterable
    {
        return [
            'review.permissions',
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            ReviewListLayout::class,

            Layout::modal('Review',Layout::rows([
                TextArea::make('review.text')
                    ->style('border: none; line-height: 1.5;')
                    ->rows(10),
            ]))->withoutApplyButton(true)->async('asyncGetReview'),

            Layout::modal('Reply',Layout::rows([
                TextArea::make('review.reply_text')
                    ->style('border: none; line-height: 1.5;')
                    ->rows(10),
            ]))->withoutApplyButton(true)->async('asyncGetReview'),

            Layout::modal('Send Reply',Layout::rows([
                TextArea::make('reply_text')
                    ->rows(10),
            ]))
        ];
    }

    public function asyncGetReview(Reviews $review): iterable
    {
        return [
            'review' => $review,
        ];
    }

    public function ChangeStatus( Request $request)
    {
        $review = \App\Models\Reviews::find($request->get('id'));

        $reviewData = [
            'status' => $request->get('status'),
        ];

        $review->update($reviewData);

        Toast::info('Saved successfully');
    }

    public function SendReply( Request $request)
    {
        $review = \App\Models\Reviews::find($request->get('id'));

        $reviewData = [
            'reply_text' => $request->reply_text,
            'status' => 1,
        ];

        $review->update($reviewData);

        Toast::info('Send successfully');
    }
}
