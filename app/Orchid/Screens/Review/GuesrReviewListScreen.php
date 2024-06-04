<?php

namespace App\Orchid\Screens\Review;

use App\Models\Properties;
use App\Models\Reviews;
use App\Orchid\Layouts\Review\GuestReviewListLayout;
use App\Orchid\Layouts\Review\PropertyReviewListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class GuesrReviewListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        // Get the authenticated user and their role
        $user = User::find(Auth::user()->id);
        $user_role = $user->role;

        // Start the review query
        $reviewQuery = Reviews::with('propertyName', 'postedUser', 'guesrUser')
            ->where('guest_id', '!=', null)
            ->defaultSort('id', 'desc');

        // Modify the query if the user role is 'root'
        if ($user_role == 'property-owner') {
            $reviewQuery = $reviewQuery->where('user_id', $user->id);
        }elseif ($user_role == 'user') {
            $reviewQuery = $reviewQuery->where('guest_id', $user->id);
        }

        // Paginate the results
        $review = $reviewQuery->paginate(12);

        // Return the reviews
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
        // Get the authenticated user and their role
        $user = \App\Models\User::find(Auth::user()->id);
        $user_role = $user->role;

        if ($user_role == 'property-owner') {
            return 'Your reviews for your guests';
        }elseif ($user_role == 'user') {
            return "Reviews that came to you";
        }elseif ($user_role == 'admin' || $user_role == 'super-admin' || $user_role == 'root') {
            return "All Gust Reviews";
        }
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        // Get the authenticated user and their role
        $user = \App\Models\User::find(Auth::user()->id);
        $user_role = $user->role;

        if ($user_role == 'property-owner') {
            return [
                Link::make(__('Reviews for your property'))
                    ->route('reviews'),
            ];
        }elseif ($user_role == 'user') {
            return [
                Link::make(__("Reviews you've made of properties you've used"))
                    ->route('reviews'),
            ];
        }elseif ($user_role == 'admin' || $user_role == 'super-admin' || $user_role == 'root') {
            return [
                Link::make(__('All Proprerty Reviews'))
                    ->route('reviews'),
            ];
        }

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
            GuestReviewListLayout::class,

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

            Layout::modal('Send Property Review',Layout::rows([
                TextArea::make('text')
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

    public function SendPropertyReview( Request $request)
    {
        $user = \App\Models\User::find((Auth::user())->id);

        $newGuestReview = Reviews::create([
            'property_id' => $request->get('property_id'),
            'user_id' => $user->id,
            'sub_property_id' => $request->get('sub_property_id'),
            'text' => $request->get('text'),
            'review_date' => Carbon::now()->toDateTimeString(),
            'publish_date' => Carbon::now()->toDateTimeString(),
            'status' => 1,
        ]);

        $newGuestReview->save();
        if ($newGuestReview) {
            $updateReview = Reviews::find($request->get('review_id'));
            $updateReview->publish_date = Carbon::now()->toDateTimeString();
            $updateReview->status = 1;
            $updateReview->save();
        }
        Toast::info('Send successfully');
    }
}