<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Booking;
use App\Models\Rooms;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Session;

class BookingConforumController extends Controller
{
    public function index($id, $chackIn, $chackOut, $adults, $children){

        $chackInStrtotime = strtotime($chackIn);
        $chackOutStrtotime = strtotime($chackOut);
        $adultsRequest = $adults;
        $childrenRequest = $children;
        $roomId = $id;

        $RoomData = Rooms::with('roomType','property')->find($roomId);

        $availability = new Availability();
        $checkAvailability = $availability->ChackAvailability($chackInStrtotime,$chackOutStrtotime,[$RoomData->property_id],$adultsRequest,$childrenRequest);

        if ($checkAvailability != false){
            $rooms = [];
            foreach ($checkAvailability as $room){
                $rooms[] = $room ->room_number;
            }
        }else{
            $rooms = [];
            $error = 'No Result';
        }

       

        if(in_array($RoomData->number, $rooms)){
            $availabilityDb = Availability::where('room_number',$RoomData->number)->first();
            $dates = (new Availability)->getDate($chackInStrtotime,$chackOutStrtotime);

            foreach ($dates['DateList'] as $key => $date){
                if ($date < 10){
                    $date = str_replace("0","",$date);
                }
                $availabilityDb->$date = $availabilityDb->$date.'['.$dates['YearMonthDateList'][$key].']';
            }

            $availabilityDb->save();

            $givenDate = new DateTime($chackIn);
            $givenDate->modify('-14 days');

            $newBooking = new Booking();

            $newBooking->property_id = $RoomData->property_id;
            $newBooking->room_type = $RoomData->room_type_id;
            $newBooking->room_id =  $RoomData->id;
            $newBooking->user_id = Session::get('user')['id'];
            $newBooking->name = Session::get('user')['name'];
            $newBooking->email = Session::get('user')['email'];
            $newBooking->phone_number = Session::get('user')['mobile_number'];
            $newBooking->check_in_Date = $chackIn;
            $newBooking->room_number = $RoomData->number;
            $newBooking->check_out_Date = $chackOut;
            $newBooking->booking_date =Carbon::now();
            $newBooking->last_payment_date = $givenDate;
            $newBooking->total_amount = $RoomData->display_price*count($dates['DateList']);
            $newBooking->payment_method ='cash';
            $newBooking->adults = $adults;
            $newBooking->children = $children;
            $newBooking->payment_status =0;
            $newBooking->booking_status = 0;

            $newBooking->save();

            return redirect()->route('web.page.detail', $RoomData->property_id)->with('success', 'Booking successfully!');;
        }else{
            return redirect()->route('web.page.detail', $RoomData->property_id)->with('error', 'No Result');
        }
    }
}
