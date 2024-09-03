<?php

namespace App\Orchid\Screens\Point;

use App\Models\Point_transactions;
use App\Models\PointStort;
use App\Models\User;
use App\Orchid\Layouts\Point\AmountDueListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class AmountDueListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $users = User::where('Amount_due', '!=', null)->get();

        return [
            'data' => $users
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Amount Due List Screen';
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

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            AmountDueListLayout::class
        ];
    }

    public function Paid(Request $request)
    {


        $user = User::find($request->get('id'));
        $pointStort = PointStort::where('user_id',$request->get('id'))->First();
        $trpoints = Point_transactions::where('from', $request->get('id'))->where('selling_status', 1)->get();

        foreach ($trpoints as $trpoint) {
            $trpoint->payment = 1;
            $trpoint->save();
        }

        $pointStort->pending_wallet = $pointStort->pending_wallet - $user->Amount_due;
        $pointStort->wallet =  $pointStort->wallet + $user->Amount_due;

        $pointStort->save();

        $user->Amount_due = null;
        $user->save();



        Toast::info('successfully');
    }
}
