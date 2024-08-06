<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Districts;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function Index(Request $request)
    {
        $destination = $request->input('destination') ?? [];
        $propertyType = $request->input('pt') ?? [];
        $PropertyFacility = $request->input('PropertyFacility') ?? [];
        $chackIn = strtotime($request->input('checkIn'));
        $chackOut = strtotime($request->input('checkOut'));
        $adult = $request->input('adult') ?? 0;

        if (!is_array($destination)){
            $destination = [$destination];
        }

        $allPropertyType = PropertyType::all();
        $destinationList = Districts::all();
        $allProperties = Properties::select('id')->get();
        $allPropertiesArray = [];

        foreach ($allProperties as $id){
            $allPropertiesArray[] = $id->id;
        }

        $list = Properties::with('propertyType','district','city')
            ->where('status', 1);


        if (!empty($chackIn) && !empty($chackOut)){
            $availability = new Availability();
            $checkAvailability = $availability->ChackAvailability($chackIn,$chackOut,$allPropertiesArray);
            $rooms = [];

            if ($checkAvailability != false){
                foreach ($checkAvailability as $room){
                    $rooms[] = $room ->room_number;
                }
            }


            $propertyIds = Rooms::whereIn('number',$rooms)->select('property_id')->get();
            $id = [];
            foreach ($propertyIds as $ids){
                if (!in_array($ids->property_id , $id)){
                    $id[] = $ids->property_id;
                }
            }
            $list = $list->whereIn('id', $id);
        }
        if (is_array($destination)){
            if (count($destination)>0) {
                $list = $list->whereIn('main_location',$destination );
            }
        }


        if (count($propertyType)>0) {
            $list = $list->whereIn('type', $propertyType);
        }

        if (!empty($PropertyFacility)) {
            $list = $list->where(function ($query) use ($PropertyFacility) {
                foreach ($PropertyFacility as $facility) {
                    $query->orWhere('facilities', 'LIKE', '%' . $facility . '%');
                }
            });
        }

        $list = $list->paginate(10);
        if (Auth::check()) {
            $userupdateWishList = User::find(Auth::user()->id);
            // Now you can safely use $userupdateWishList
        } else {
            $userupdateWishList = [];
        }

        return view('web.list')->with([
            'list' => $list,
            'propertyTypes' => $allPropertyType,
            'UrlPropertyType' => $propertyType,
            'UrlPropertyFacility' => $PropertyFacility,
            'userupdateWishList' => $userupdateWishList,
            'destinationList' => $destinationList,
            'UrlDestinationList' => $destination,
            'checkIn' => $request->input('checkIn'),
            'checkOut' => $request->input('checkOut'),
        ]);
    }
}
