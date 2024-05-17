<?php

namespace App\Orchid\Screens\Point;

use App\Models\Point_transactions;
use App\Models\PointStort;
use App\Orchid\Layouts\Point\AllTransectionsListLayout;
use App\Orchid\Layouts\Point\DonationFormLayout;
use App\Orchid\Layouts\Point\PointCountLayout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class DonationsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $transections =Point_transactions::filters()
            ->where(function ($query) use ($user) {
                $query->orWhere('to', '=', $user->id)
                    ->orWhere('from', '=', $user->id);
            })
            ->with('ToUser', 'FromUser')
            ->where('donations', 1)
            ->paginate(5);

        return [
            'transections'=>$transections
        ];
    }


    public function permission(): ?iterable
    {
        return [
            'point.donations.permissions'
        ];
    }


    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Donations';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Back'))
                ->href(route('points'))
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
            Layout::block(DonationFormLayout::class)
                ->title(__('Donation Your Points '))
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.'))
                ->commands(
                    Button::make(__('Donate'))
                        ->type(Color::BASIC())
                        ->confirm('Confirm Donation')
                        ->icon('bs.check-circle')
                        ->method('Donation')
                ),
            AllTransectionsListLayout::class


        ];
    }


        public function Donation(Request $request): void
        {
            // Fetch the authenticated user
            $user = \App\Models\User::find((Auth::user())->id);

            // Validate the request data
            $request->validate([
                'user' => 'required',
                'point_count' => 'required|integer|min:1|not_regex:/\./',
                'password' => 'required',
            ]);


            if (Hash::check($request->password, $user->password)) {
                    $FromUserPointCount = PointStort::where('user_id', $user->id)->value('point_count');
                    $ToUserPointCount = PointStort::where('user_id', $request->user)->value('point_count');

                    if ($FromUserPointCount >= $request->point_count) {
                        $AfterFromUserPointCountF = $FromUserPointCount - $request->point_count;
                        $AfterToUserPointCountF = $ToUserPointCount + $request->point_count;

                        PointStort::where('user_id', $user->id)->update(['point_count' => $AfterFromUserPointCountF]);
//

                        $pointStort = PointStort::where('user_id', $request->user)->firstOrNew();
                        $pointStort->point_count = $AfterToUserPointCountF;
                        $pointStort->user_id = $request->user;
                        $pointStort->save();

                        $point_transactions = New Point_transactions();

                        $point_transactions->from = $user->id;
                        $point_transactions->to = $request->user;
                        $point_transactions->point_count = $request->point_count;
                        $point_transactions->discount_amount = 00.00;
                        $point_transactions->discount_percentage = 0;
                        $point_transactions->amount = 00.00;
                        $point_transactions->donations = 1;
                        $point_transactions->transaction_date = Carbon::now();
                        $point_transactions->status = 1;

                        $point_transactions->save();

                        Toast::success(__('Donation Successful'));
                    } else {
                        Toast::error(__('Point Not Found'));
                    }
            }else{
                Toast::error(__('Password Not Match'));
            }

        }


}
