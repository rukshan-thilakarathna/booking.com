<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function Index(Request $request)
    {
        $destination = $request->input('destination');
        $propertyType = $request->input('propertyType');

        $allPropertyType = PropertyType::all();

        $list = Properties::with('propertyType','district','city')
            ->where('status', 1);

        if (!empty($destination)) {
            $list = $list->where('main_location',$destination );
        }

        if (!empty($propertyType)) {
            $list = $list->where('type', $propertyType);
        }

        $list = $list->paginate(10);

        return view('web.list')->with([
            'list' => $list,
            'propertyTypes' => $allPropertyType,
        ]);
    }
}
