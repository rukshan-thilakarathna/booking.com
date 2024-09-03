<?php

namespace App\Http\Controllers\web\page;

use App\Http\Controllers\Controller;
use App\Models\Point_transactions;
use App\Models\PointStort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PointController extends Controller
{
   public function index()
   {
       $bypoints = Point_transactions::with('FromUser')->where('selling_status',2)->orderBy('discount_amount' ,'DESC')->orderBy('id', 'desc')->get();

       return view('web.points')->with([
           'bypoints' => $bypoints,
       ]);
   }

   public function buy(Request $request)
   {
       $trpoint = Point_transactions::where('id' , $request->id)->first();
       $poinyStort = PointStort::where('user_id' ,Session::get('user')['id'])->first();
       $FrompoinyStort = PointStort::where('user_id' ,$trpoint->from)->first();


       $FrompoinyStort->locked_points =  $FrompoinyStort->locked_points - $trpoint->point_count;
       $FrompoinyStort->save();

       $poinyStort->point_count = $poinyStort->point_count + $trpoint->point_count;
       $poinyStort->wallet = $poinyStort->wallet + $trpoint->point_count;
       $poinyStort->save();

       $trpoint->to = Session::get('user')['id'];
       $trpoint->selling_status = 1;
       $trpoint->status = 1;
       $trpoint->save();

       $user = \App\Models\User::find($trpoint->from);
       $user->Amount_due = $user->Amount_due + ($trpoint->amount*90/100);
       $user->save();

       return redirect()->back()->with('success', 'successfully!');




   }


}
