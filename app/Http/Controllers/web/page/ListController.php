<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use App\Models\Districts;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\Rooms;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function Index(Request $request)
    {
        $destination = $request->input('destination') ?? [];
        $propertyType = $request->input('pt') ?? [];
        $PropertyFacility = $request->input('PropertyFacility') ?? [];
        $chackIn = strtotime($request->input('checkIn'));
        $chackOut = strtotime($request->input('checkOut'));

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
            foreach ($checkAvailability as $room){
                $rooms[] = $room ->room_number;
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

        if (count($destination)>0) {
            $list = $list->whereIn('main_location',$destination );
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


        return view('web.list')->with([
            'list' => $list,
            'propertyTypes' => $allPropertyType,
            'UrlPropertyType' => $propertyType,
            'UrlPropertyFacility' => $PropertyFacility,
            'destinationList' => $destinationList,
            'UrlDestinationList' => $destination,
            'checkIn' => $request->input('checkIn'),
            'checkOut' => $request->input('checkOut'),
        ]);
    }
}
