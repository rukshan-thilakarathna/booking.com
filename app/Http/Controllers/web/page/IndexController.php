<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\web\DestinationsController;
use App\Models\PropertyType;

class IndexController extends Controller
{
    public function index()
    {
        // Instantiate the DestinationsController
        $destinationsController = new DestinationsController();
        // Call the PropetyDestinations method
        $propertiesDestinations = $destinationsController->PropetyDestinations();

        $uniquePropertyCount=[];
        foreach ($propertiesDestinations as $uniqueProperty) {
            $uniquePropertyCount[$uniqueProperty->main_location] =  $destinationsController->DestinationsHasPropertyCount($uniqueProperty->main_location);
        }

        $propertyType = PropertyType::all();


        return view('web.list')->with([
            'propertiesDestinations' => $propertiesDestinations,
            'propertyTypes' => $propertyType,
            'uniquePropertyCount' =>$uniquePropertyCount
        ]);
    }
}
