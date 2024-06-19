<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Rooms;
use App\Models\RoomType;
use App\Orchid\Layouts\Rooms\RoomsListLayout;
use App\Orchid\Layouts\RoomType\RoomTypeListLayout;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

class RoomsListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(RoomType $room_type_id): iterable
    {
        $rooms = Rooms::filters()->where('room_type_id',$room_type_id->id)->with('roomType','property')->paginate(12);
        return [
            'rooms' => $rooms,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Rooms';
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
            RoomsListLayout::class
        ];
    }
}
