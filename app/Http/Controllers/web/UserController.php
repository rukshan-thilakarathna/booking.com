<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\PointStort;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserHasRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Watson\Active\Route;

class UserController extends Controller
{
    public function registration($role)
    {
        // Define an array of valid roles
        $validRoles = ['user', 'property-owner','worker'];

        // Check if the role exists in the array of valid roles
        if (in_array($role, $validRoles)) {
            return view('Auth.registration', ['role' => $role]); // Return the role if it's valid
        } else {
            abort(404); // Abort the request with a 404 response for invalid roles
        }
    }

    public function StoreUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users,email', // Ensure email is unique in the 'users' table
            'passwd'   => 'required|string',
            'repasswd' => 'required|string|same:passwd', // Ensures 'repasswd' matches 'passwd'
        ]);

        // Create a new user instance and save it to the database
        $user = new User();
        $user->name = $request->name; // corrected assignment
        $user->url = Str::slug($request->name);
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->passwd); // Assuming you're storing hashed passwords
        $user->save();

        $userId = $user->id;
        $role = $request->role;

        $roleId = Roles::where('slug',$role)->first();

        $createuserrole = new UserHasRoles();
        $createuserrole->user_id = $userId;
        $createuserrole->role_id = $roleId->id;
        $createuserrole->save();


        $pointStrt = PointStort::create([
            'user_id' => $createuserrole->id,
            'point_count' => 0,
            'wallet' => 0,
            'locked_points' => 0,
            'locked_wallet' => 0,
            'pending_wallet' => 0,
        ]);





        return redirect()->route('web.login');
    }
}
