<?php

namespace App\Orchid\Screens\Rooms;

use App\Models\Availability;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Orchid\Layouts\Rooms\RoomsListLayout;
use App\Orchid\Layouts\RoomType\RoomTypeListLayout;
use App\View\Components\RoomsCalendar;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Toast;

class RoomsCalendarListScreen extends Screen
{
    public $RoomNumber = 0;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Rooms $id): iterable
    {

        $availabierelities = Availability::where('room_number', $id->number)->get();


$this->RoomNumber = $id->number;

        return [
            'id' => $id->number,
            'availabierelities' => $availabierelities,
            ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Room number 00'.$this->RoomNumber.' Booking Calendar';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->route('room-types')
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
            \Orchid\Support\Facades\Layout::component(RoomsCalendar::class)
        ];
    }


}
