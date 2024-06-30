<?php

namespace App\Orchid\Screens\Booking;


use App\Models\Availability;
use App\Models\Booking;
use App\Models\Rooms;
use App\Orchid\Layouts\Booking\BookingCreateAndEditLayout;
use App\Orchid\Layouts\Rooms\AvailableRoomsListLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookingAvailableListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public $chackIn;
    public $chackOut;
    public $adults;
    public $children;

    public function query(Request $request): iterable
    {
        $room = Rooms::with('roomType','property')->whereIn('number', $request['rooms'])->get();

        $this->chackIn = $request['chackIn'] ?? 0;
        $this->chackOut = $request['chackOut'] ?? 0;
        $this->adults = $request['adults'] ?? 0;
        $this->children = $request['children'] ?? 0;

        return [
            'rooms' => $room
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */

    public function name(): ?string
    {
        return 'BookingListScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

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
            AvailableRoomsListLayout::class,
            Layout::modal('Place new booking',
                [
                    Layout::block(BookingCreateAndEditLayout::class)
                        ->title(__(' Information'))
                        ->vertical()
                        ->description(__('Update your account\'s profile information and email address.')),
                ]
            )->size(Modal::SIZE_LG)->applyButton('Create'),
        ];
    }



    public function CreateBooking(Request $request)
    {
        $BookRoom = Rooms::with('roomType','property')->where('id',$request->get('roomId'))->first();

        $newBooking = new Booking();

        $newBooking->property_id = $BookRoom->property_id;
        $newBooking->room_type = $BookRoom->room_type_id;
        $newBooking->room_id =  $request->get('roomId');
        $newBooking->user_id = $request['booking.room_id'] ?? 0;
        $newBooking->name = $request['booking.name'];
        $newBooking->email = $request['booking.email'] ?? 0;
        $newBooking->phone_number = $request['booking.phone_number'];
        $newBooking->check_in_Date = date("Y-m-d", $this->chackIn);
        $newBooking->room_number = $BookRoom->number;
        $newBooking->check_out_Date = date("Y-m-d", $this->chackOut);
        $newBooking->booking_date =Carbon::now();
        $newBooking->total_amount = $BookRoom->display_price;
        $newBooking->payment_method ='cash';
        $newBooking->adults = $this->adults;
        $newBooking->children = $this->children;
        $newBooking->special_requests =$request['booking.special_requests'];
        $newBooking->payment_status =0;
        $newBooking->booking_status = 0;

        $availability = (new Availability)->ChackAvailability($this->chackIn,$this->chackOut,$BookRoom->property_id,$this->adults,$this->children);
dd($availability);
        $perameters=[];
        if (count($availability) >0){
            foreach ($availability as $key => $room){
                $perameters[] = $room;
            }
        }

        if (in_array($perameters, $BookRoom->number)){
            Toast::info(__('Booking  Created'));
        }






    }

}
