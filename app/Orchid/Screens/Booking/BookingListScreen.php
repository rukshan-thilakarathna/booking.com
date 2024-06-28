<?php

namespace App\Orchid\Screens\Booking;

use App\Models\Availability;
use App\Models\Booking;
use App\Models\Properties;
use App\Models\Rooms;
use App\Orchid\Layouts\Booking\BookingCreateAndEditLayout;
use App\Orchid\Layouts\Booking\BookingListLayout;
use App\Orchid\Layouts\RoomType\RoomTypeBathRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeEditLayout;
use App\Orchid\Layouts\RoomType\RoomTypeKitchenFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeRoomFacilitiesLayout;
use App\Orchid\Layouts\RoomType\RoomTypeViewFacilitiesLayout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Modal;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BookingListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $bookings = Booking::with('properties','roomType','Room')->filters()
            ->orderBy('id', 'desc')->paginate(12);

        return [
            'bookings' => $bookings
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
            ModalToggle::make('Chack Availability')
                ->modal('Chack Availability')
                ->method('ChackAvailability'),

            ModalToggle::make('Place new booking')
                ->modal('Place new booking')
                ->method('CreateBooking'),
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
            BookingListLayout::class,
            Layout::modal('Place new booking',
                [
                    Layout::block(BookingCreateAndEditLayout::class)
                    ->title(__(' Information'))
                    ->vertical()
                    ->description(__('Update your account\'s profile information and email address.')),
                ]
            )->size(Modal::SIZE_LG)->applyButton('Create'),

            Layout::modal('Chack Availability',Layout::rows([

                Select::make('properties')
                    ->fromQuery(Properties::where('user_id',(Auth::user())->id),'name')
                    ->multiple()
                    ->title('Select Properties')
                    ->required(),

                Group::make([
                    Input::make('chack_in')
                        ->type('date')
                        ->required()
                        ->title('Chack In'),

                    Input::make('chack_out')
                        ->type('date')
                        ->required()
                        ->title('Chack Out')
                ],),
                Group::make([
                    Input::make('adults')
                        ->type('number')
                        ->title('Adults'),
                    Input::make('children')
                        ->type('number')
                        ->title('Children')
                ],),
            ]))->applyButton('Chack'),
        ];
    }

    public function ChackAvailability(Request $request)
    {

        $chackIn = strtotime($request->chack_in);
        $chackOut = strtotime($request->chack_out);
        $curentDate = strtotime(date("Y-m-d"));
        $adults = $request->adults;
        $children = $request->children;

        if ($curentDate <= $chackIn && $curentDate <= $chackOut && $chackIn <= $chackOut) {
            $FullDateList = [];
            $DateList = [];
            $YearMonthDateList = [];
            for ($currentTimestamp = $chackIn; $currentTimestamp <= $chackOut; $currentTimestamp = strtotime("+1 day", $currentTimestamp)) {
                $FullDateList[] = date("Y-m-d", $currentTimestamp);
                $DateList[] = date("d", $currentTimestamp);
                $YearMonthDateList[] = date("Y-m", $currentTimestamp);
            }


            $rooms = Availability::whereIn('property_id',$request->properties);

            foreach ($DateList as $key => $date){
                $rooms = $rooms->whereNot($date,'LIKE','%['.$YearMonthDateList[$key].']%' );
            }
            $rooms = $rooms->paginate(10);

            dd($rooms);

        } else {
            return redirect('/');
        }
    }

    public function CreateBooking(Request $request)
    {
        $BookRoom = Rooms::with('roomType','property')->where('id',$request['booking.room_id'])->first();

        $newBooking = new Booking();

        $newBooking->property_id = $BookRoom->property_id;
        $newBooking->room_type = $BookRoom->room_type_id;
        $newBooking->room_id =  $request['booking.room_id'];
        $newBooking->user_id = $request['booking.room_id'] ?? 0;
        $newBooking->name = $request['booking.name'];
        $newBooking->email = $request['booking.email'] ?? 0;
        $newBooking->phone_number = $request['booking.phone_number'];
        $newBooking->check_in_Date = $request['booking.check_in_Date'];
        $newBooking->room_number = $BookRoom->number;
        $newBooking->check_out_Date = $request['booking.check_out_Date'];
        $newBooking->booking_date =Carbon::now();
        $newBooking->total_amount = $BookRoom->display_price;
        $newBooking->payment_method ='cash';
        $newBooking->adults = $request['booking.adults'];
        $newBooking->children = $request['booking.children'];
        $newBooking->special_requests =$request['booking.special_requests'];
        $newBooking->payment_status =0;
        $newBooking->booking_status = 0;

        $newBooking->save();

        Toast::info(__('Booking  Created'));

    }

    public function ChangePaymentStatus(Request $request)
    {
        $booking = Booking::findOrFail($request->get('id'));

        if ($request->get('payment_status')==0){
            $booking->payment_status = 1;
            $booking->booking_status = 1;
        }
        $booking->save();
        Toast::info(__('Successful'));
    }

    public function CancelBooking(Request $request)
    {
        $booking = Booking::findOrFail($request->get('id'));
            $booking->booking_status = 2;
        $booking->save();
        Toast::info(__('Successful'));
    }
}
