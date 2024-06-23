<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function PropetyDestinations()
    {
        // Fetch properties with district relationship
        $properties = Properties::with('district')->orderBy('id', 'ASC')->get();

        // Remove duplicates based on main_location
        $uniqueProperties = $properties->unique('main_location');

        // Optionally, reindex the collection
        $uniqueProperties = $uniqueProperties->values();

        return $uniqueProperties;
    }

    public function DestinationsHasPropertyCount($destinationId)
    {
        $properties = Properties::where('main_location', $destinationId)->count();
        return $properties;
    }

}
