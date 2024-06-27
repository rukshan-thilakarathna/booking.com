<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Districts;
use App\Models\Properties;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function Index(Request $request)
    {
        $destination = $request->input('destination') ?? '';
        $propertyType = $request->input('pt') ?? [];
        $PropertyFacility = $request->input('PropertyFacility') ?? [];



        $allPropertyType = PropertyType::all();
        $destinationList = Districts::all();

        $list = Properties::with('propertyType','district','city')
            ->where('status', 1);

        if (!empty($destination)) {
            $list = $list->where('main_location',$destination );
        }

        if (!empty($propertyType)) {
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
        ]);
    }
}
