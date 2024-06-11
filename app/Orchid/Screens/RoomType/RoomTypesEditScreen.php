<?php

namespace App\Orchid\Screens\RoomType;

use App\Orchid\Layouts\RoomType\FullPropertyFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RoomTypesEditScreen extends Screen
{

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */

    public function name(): ?string
    {
        return 'RoomTypesEditScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */

    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**$user = \App\Models\User::find((Auth::user())->id);
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */

    public function layout(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            Layout::block(RoomTypeEditLayout::class)
                ->title(__(' Information'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(FullPropertyFacilitiesLayout::class)
                ->title(__(' Full Property Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeRoomFacilitiesLayout::class)
                ->title(__('Room Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeBathRoomFacilitiesLayout::class)
                ->title(__('BathRoom Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeViewFacilitiesLayout::class)
                ->title(__('View Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),

            Layout::block(RoomTypeKitchenFacilitiesLayout::class)
                ->title(__('Kitchen Facilities'))
                ->description(__('Update your account\'s profile information and email address.')),
        ];
    }

    public function save(Request $request)
    {
        Toast::info(__('  was saved.'));
    }
}
