<?php

namespace App\Orchid\Screens\Point;

use App\Models\Point_transactions;
use App\Models\PointPrice;
use App\Models\PointStort;
use App\Orchid\Layouts\Point\AllTransectionsListLayout;
use App\Orchid\Layouts\Point\DonationFormLayout;
use App\Orchid\Layouts\Point\SellingFormLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SellListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $transactions = Point_transactions::filters()
            ->where(function ($query) use ($user) {
                $query->orWhere('to', '=', $user->id)
                    ->orWhere('from', '=', $user->id);
            })
            ->with('ToUser', 'FromUser')
            ->where('donations', '=', 0)
            ->paginate(5);


        return [
            'transections'=>$transactions
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'point.Sell.permissions'
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Sell Your Points';
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
            Layout::block(SellingFormLayout::class)
                ->title(__('Donation Your Points '))
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.'))
                ->commands(
                    Button::make(__('Release to Market'))
                        ->type(Color::BASIC())
                        ->confirm('Confirm Release')
                        ->icon('bs.check-circle')
                        ->method('Release')
                ),
            AllTransectionsListLayout::class
        ];
    }


    public function Release(Request $request): void
    {
        // Fetch the authenticated user
        $user = \App\Models\User::find((Auth::user())->id);

        // Validate the request data
        $request->validate([
            'Price' => 'required|integer|min:1|not_regex:/\./',
            'point_count' => 'required|integer|min:1|not_regex:/\./',
            'password' => 'required',
        ]);


        if (Hash::check($request->password, $user->password)) {
            $FromUserPointCount = PointStort::where('user_id', $user->id)->value('point_count');

            if ($FromUserPointCount >= $request->point_count) {
                $pointPrice = PointPrice::where('id',1)->first();
                $pointPrice = $pointPrice->price;
                $RealPointAmount = $request->point_count * $pointPrice;

                if($RealPointAmount >= $request->Price){
                    $AfterFromUserPointCountF = $FromUserPointCount - $request->point_count;

                    PointStort::where('user_id', $user->id)->update(['point_count' => $AfterFromUserPointCountF,'locked_points' => $request->point_count]);

                    $discount_amount =$RealPointAmount - $request->Price;
                    $discount_percentage = ($request->Price / $RealPointAmount)*100;

                    $point_transactions = New Point_transactions();

                    $point_transactions->from = $user->id;
                    $point_transactions->to = 0;
                    $point_transactions->point_count = $request->point_count;
                    $point_transactions->discount_amount = $discount_amount.'.00';
                    $point_transactions->discount_percentage = $discount_percentage;
                    $point_transactions->amount = $request->Price.'.00';
                    $point_transactions->donations = 0;
                    $point_transactions->selling_status = 2;
                    $point_transactions->transaction_date = Carbon::now();
                    $point_transactions->status = 2;

                    $point_transactions->save();
                    Toast::success(__('Successful Release to Market'));
                }else {
                    Toast::error(__('Max Point Amount '.$RealPointAmount.' USD'));
                }

            } else {
                Toast::error(__('Point Not Found'));
            }
        }else{
            Toast::error(__('Password Not Match'));
        }

    }
}
