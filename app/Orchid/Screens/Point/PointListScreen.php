<?php

namespace App\Orchid\Screens\Point;

use App\Models\Point_transactions;
use App\Models\PointStort;
use App\Orchid\Layouts\Point\AllTransectionsListLayout;
use App\Orchid\Layouts\Point\PointCountLayout;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PointListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $points = PointStort::with('user')->where('user_id',$user->id)->first();
        $transections =Point_transactions::filters()
            ->where(function ($query) use ($user) {
                $query->orWhere('to', '=', $user->id)
                    ->orWhere('from', '=', $user->id);
            })
            ->with('ToUser', 'FromUser')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return [
            'points' => $points,
            'transections'=>$transections
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Point Management';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        $points = PointStort::with('user')->where('user_id',$user->id)->first();

        $cansee = false;

        if($user->role == "property-owner"){
            if ($points->point_count > 100){
                $cansee = true;
            }
        }elseif ($user->role == "user"){
            $cansee = true;
        }


        return [
            Link::make(__('Donations'))
                ->canSee($user->hasAnyAccess(['point.donations.permissions']) && $cansee )
            ->href(route('point.donations')),

            Link::make(__('Amount Due'))
                ->canSee($user->role == "super-admin" || $user->role == "root")
                ->href(route('amount.due')),

            Link::make(__('Sell Your Points'))
                ->canSee($user->hasAnyAccess(['point.Sell.permissions']) && $cansee)
                ->href(route('point.sell'))
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'point.permissions'
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
            Layout::block(PointCountLayout::class)
                ->title(__('Your Point Count'))
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.')),


            AllTransectionsListLayout::class

        ];
    }
}
