<?php

namespace App\Orchid\Screens\WishList;

use App\Models\Properties;
use App\Orchid\Layouts\WishList\WishListLayout;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;

class WishListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $user = Auth::user();
        $wishlist = explode(",", $user->wishlist);
        $data = Properties::whereIn('id', $wishlist)->with('propertyType', 'propertyOwner', 'district', 'city')->get();

        return [
            'data' => $data
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Wish List Screen';
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
            WishListLayout::class
        ];
    }
}
