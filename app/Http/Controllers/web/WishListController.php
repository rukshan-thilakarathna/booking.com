<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index($id)
    {
        $result = false;
        if (Auth::user()->id == null){

        }else{
            $userWishList = $user = User::where('id', Auth::user()->id)->first();
            $WishListArray = explode(',', $userWishList->wishlist);


            if (count($WishListArray) > 0){

                if (in_array($id ,$WishListArray)){

                    $key = array_search($id, $WishListArray);
                    unset($WishListArray[$key]);
                    $WishListArray = array_values($WishListArray);


                    $userupdateWishList = User::find(Auth::user()->id);
                    $userupdateWishList->wishlist = implode(',', $WishListArray);
                    $userupdateWishList->save();

                }else{

                    $userupdateWishList = User::find(Auth::user()->id);
                    $userupdateWishList->wishlist = $userWishList->wishlist.','.$id;
                    $userupdateWishList->save();
                    $result = true;

                }
            }else{

                $userupdateWishList = User::find(Auth::user()->id);
                $userupdateWishList->wishlist = $userWishList->wishlist.','.$id;
                $userupdateWishList->save();
                $result = true;

            }
        }

        return $result;


    }
}
