<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Point_transactions;
use Illuminate\Http\Request;

class PointController extends Controller
{
   public function index()
   {
       $bypoints = Point_transactions::with('FromUser')->where('selling_status',2)->get();

       return view('web.points')->with([
           'bypoints' => $bypoints,
       ]);
   }
}
