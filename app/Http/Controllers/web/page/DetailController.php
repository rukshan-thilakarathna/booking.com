<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Properties;
use App\Models\Reviews;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request,$id)
    {
        $chackIn = strtotime($request->input('checkIn')) ?? 0;
        $chackOut = strtotime($request->input('checkOut')) ?? 0;
        $adults =$request->input('adults') ?? 0;
        $children = $request->input('children') ?? 0;
        $availability = false;

        if ($chackIn && $chackOut ){
            $availability=true;
            $availability = new Availability();
            $checkAvailability = $availability->ChackAvailability($chackIn,$chackOut,[$id],$adults,$children);

            if ($checkAvailability != false){
                $rooms = [];
                foreach ($checkAvailability as $room){
                    $rooms[] = $room ->room_number;
                }
            }else{
                $rooms = [];
                $error = 'No Result';
            }

        }
        $property = Properties::with('propertyType','district','city')->find($id);
        $roomTypes = RoomType::where('property_id', $id)->where('status', 1)->get();

        $review = Reviews::where('property_id', $id)->where('publish_date','<=', Carbon::now()->toDateTimeString())->get();

        return view('web.detail')->with([
            'property' => $property,
            'CheckAvailability' => $availability,
            'AvailabileRooms' => $rooms ?? [],
            'error' =>$error ?? 0,
            'reviews' => $review,
            'UrlData' => [
                'chackIn'=> $request->input('checkIn'),
                'chackOut'=> $request->input('checkOut'),
                'adults'=>$adults,
                'children'=>$children,
            ],
            'roomTypes' => $roomTypes,
        ]);
    }
}
