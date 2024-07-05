<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\web\DestinationsController;
use App\Models\Districts;
use App\Models\Properties;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {

        // Instantiate the DestinationsController
        $destinationsController = new DestinationsController();
        // Call the PropetyDestinations method
        $propertiesDestinations = $destinationsController->PropetyDestinations();
        $destinations = Districts::all();

        $uniquePropertyCount=[];
        foreach ($propertiesDestinations as $uniqueProperty) {
            $uniquePropertyCount[$uniqueProperty->main_location] =  $destinationsController->DestinationsHasPropertyCount($uniqueProperty->main_location);
        }

        $promotinalPropertyPromotionBar01 = Properties::where('promotion_bar_01',1)->with('propertyType','district','city')->get();
        $promotinalPropertyPromotionBar02 = Properties::where('promotion_bar_02',1)->with('propertyType','district','city')->get();

        $userupdateWishList = User::find(Auth::user()->id);
        $propertyType = PropertyType::all();

        return view('web.index')->with([
            'propertiesDestinations' => $propertiesDestinations,
            'PromotionBar01' => $promotinalPropertyPromotionBar01,
            'userupdateWishList' => $userupdateWishList,
            'PromotionBar02' => $promotinalPropertyPromotionBar02,
            'propertyTypes' => $propertyType,
            'destinations' => $destinations,
            'uniquePropertyCount' =>$uniquePropertyCount
        ]);
    }
}
