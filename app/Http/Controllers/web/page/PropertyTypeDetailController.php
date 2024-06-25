<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class PropertyTypeDetailController extends Controller
{
    public function index($id)
    {
        $roomType = RoomType::with('propertyName','property')->find($id);

        return view('web.property-type-detail')->with([
            'roomType' => $roomType,
        ]);
    }
}
