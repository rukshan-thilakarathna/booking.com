<?php

namespace App\Orchid\Screens\Review;

use App\Models\Properties;
use App\Models\Reviews;
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

class PropertyReviewListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        // Get the authenticated user and their role
        $user = \App\Models\User::find(Auth::user()->id);
        $user_role = $user->role;
        $user_property = Properties::where('user_id', $user->id)->pluck('id')->all();

        // Start the review query
        $reviewQuery = \App\Models\Reviews::with('propertyName', 'postedUser')
            ->where('guest_id', '=', null)
            ->defaultSort('id', 'desc');

        // Modify the query if the user role is 'root'
        if ($user_role == 'property-owner') {
            $reviewQuery = $reviewQuery->wherein('property_id', $user_property);
        }elseif ($user_role == 'user') {
            $reviewQuery = $reviewQuery->where('user_id', $user->id);
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
            return 'Reviews for your property';
        }elseif ($user_role == 'user') {
            return "Reviews you've made of properties you've used";
        }elseif ($user_role == 'admin' || $user_role == 'super-admin' || $user_role == 'root') {
            return "All Proprerty Reviews";
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
                Link::make(__('Your reviews for your guests'))
                    ->route('guest-reviews'),
            ];
        }elseif ($user_role == 'user') {
            return [
                Link::make(__('Reviews that came to you'))
                    ->route('guest-reviews'),
            ];
        }elseif ($user_role == 'admin' || $user_role == 'super-admin' || $user_role == 'root') {
            return [
                Link::make(__('All Gust Reviews'))
                    ->route('guest-reviews'),
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
            PropertyReviewListLayout::class,

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

            Layout::modal('Send Guest Review',Layout::rows([
                TextArea::make('text')
                    ->rows(10),
            ]))
        ];
    }

// 9

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


    public function SendGuestReview( Request $request)
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $updateReview = Reviews::where('booking_id', $request->get('booking_id'))->first();

        if (!empty($updateReview)) {
            $updateReview->publish_date = Carbon::now()->toDateTimeString();
            $updateReview->status = 1;
            $updateReview->save();
        }

        $newGuestReview = Reviews::create([
            'property_id' => $request->get('property_id'),
            'user_id' => $user->id,
            'sub_property_id' => $request->get('sub_property_id'),
            'guest_id' => $request->get('guest_id'),
            'text' => $request->get('text'),
            'booking_id' => $request->get('booking_id'),
            'review_date' => Carbon::now()->toDateTimeString(),
            'publish_date' =>  !empty($updateReview) ? \Illuminate\Support\Carbon::now()->toDateTimeString() :\Illuminate\Support\Carbon::now()->addDays(14)->toDateTimeString(),
            'status' => !empty($updateReview) ? 1 : 0,
        ]);
        $newGuestReview->save();

        Toast::info('Send successfully');
    }
}
