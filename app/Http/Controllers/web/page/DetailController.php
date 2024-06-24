<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\RoomType;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $property = Properties::with('propertyType','district','city')->find($id);

        $roomTypes = RoomType::where('property_id', $id)->get();



        return view('web.detail')->with([
            'property' => $property,
            'roomTypes' => $roomTypes,
        ]);
    }
}
