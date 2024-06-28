<?php

namespace App\Orchid\Screens\Booking;

use App\Models\Booking;
use App\Models\Rooms;
use App\Models\RoomType;
use App\Orchid\Layouts\Booking\BookingCreateAndEditLayout;
use App\Orchid\Layouts\Role\RoleEditLayout;
use App\Orchid\Layouts\Rooms\RoomCreateAndUpdateLayout;
use App\Orchid\Layouts\RoomType\FullPropertyFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookingEditScreen extends Screen
{
    public $bookingId;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */

    public function query(Booking $id): iterable
    {
        $this->bookingId = $id;
        return [
            'booking' => $id
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */

    public function name(): ?string
    {
        return 'Booking Edit Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */

    public function commandBar(): iterable
    {
        return [
            Link::make('Back')->route('bookings'),
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
        return [
             \Orchid\Support\Facades\Layout::block(BookingCreateAndEditLayout::class)
                 ->title(__('Property Owner Information'))
                 ->description(__('Update your account\'s profile information and email address.')),
        ];
    }


    public function save(Request $request)
    {
        $BookRoom = Rooms::with('roomType','property')->where('id',$request['booking.room_id'])->first();
        $updateBooking = Booking::findOrFail($request->id);



        $updateBooking->property_id = $BookRoom->property_id;
        $updateBooking->room_type = $BookRoom->room_type_id;
        $updateBooking->room_id =  $request['booking.room_id'];
        $updateBooking->user_id = $request['booking.room_id'] ?? 0;
        $updateBooking->name = $request['booking.name'];
        $updateBooking->email = $request['booking.email'] ?? 0;
        $updateBooking->phone_number = $request['booking.phone_number'];
        $updateBooking->check_in_Date = $request['booking.check_in_Date'];
        $updateBooking->room_number = $BookRoom->number;
        $updateBooking->check_out_Date = $request['booking.check_out_Date'];
        $updateBooking->total_amount = $BookRoom->display_price;
        $updateBooking->adults = $request['booking.adults'];
        $updateBooking->children = $request['booking.children'];
        $updateBooking->special_requests =$request['booking.special_requests'];

        $updateBooking->save();


        Toast::info(__('Booking Has updated'));
    }
}
