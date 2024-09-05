<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\smsMail;
use App\Models\PointStort;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserHasRoles;
use App\Notifications\PropertyNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function forgotPassword()
    {
        return view('Auth.forgot-password'); // Return the role if it's valid
    }

    public function forgotPasswordSend(Request $request)
    {
        $request->validate([
            'email'    => 'required|string|email',
        ]);

        $user = User::where('email', $request->email)->get();

        if ($user->count()) {
            $user = User::where('email', $request->email)->first();
            $newPassword = Str::random(8);

            $user->password = Hash::make($newPassword);
            $user->save();

            $data = ['message' => 'New Password: '.$newPassword];
            $data = [
                'subject' => 'Barterbed forgot password',
                'message' => 'New Password: '.$newPassword,
                'ISeMAIL' => 0
            ];
            Mail::to($request->email)->send(new smsMail($data));
            return redirect()->route('user.forgot.password')->with(['success' => 'We have emailed your new password!']);
        }else{
            return redirect()->route('user.forgot.password')->with(['error' => 'We can not find a user with that e-mail address.']);
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

        if($role=='user'){
        $pointStrt = PointStort::create([
            'user_id' => $userId,
            'point_count' => 0,
            'wallet' => 0,
            'locked_points' => 0,
            'locked_wallet' => 0,
            'pending_wallet' => 0,
        ]);
    }

        function generateEmailVerificationToken($length = 32) {
            return bin2hex(random_bytes($length / 2));
        }

      
        $token = generateEmailVerificationToken();

        $link = route('user.email.verification',[$token,$request->email]);


        $data = [
            'subject' => 'Barterbed Email Verification',
            'message' => 'Verification Your Email Click this Link',
            'url' => $link,
            'urltext' => 'Click This And verify now',
            'ISeMAIL' => 1
        ];
        
        Mail::to($request->email)->send(new smsMail($data));
        return redirect()->route('user.registration',$role)->with(['success' => 'success! Check Your Email And Verify Your Email.']);

        // return redirect()->route('web.login');
    }

    public function emailVerification(Request $request ,$token ,$email){

        $user = User::where('email', $email)->first();
        $user->email_verified_at = Carbon::now();
        $user->save();

        $user = \Orchid\Platform\Models\User::find(19);
        $user->notify(new PropertyNotification('Create New Account ' ,$user->name));

        return redirect()->route('web.login');
    }
}
