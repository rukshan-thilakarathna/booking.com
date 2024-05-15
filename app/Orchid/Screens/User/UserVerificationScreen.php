<?php

declare(strict_types=1);

namespace App\Orchid\Screens\User;

use App\Models\PointStort;
use App\Orchid\Layouts\User\LegalDocumen02tLayout;
use App\Orchid\Layouts\User\LegalDocument01Layout;
use App\Orchid\Layouts\User\LocationLayout;
use App\Orchid\Layouts\User\ProfilePasswordLayout;
use App\Orchid\Layouts\User\UserEditLayout;
use App\Orchid\Layouts\User\VerifiedLayout;
use App\Orchid\Layouts\User\VerifyPendingLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Access\Impersonation;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class UserVerificationScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     *
     * @return array
     */
    public function query(Request $request): iterable
    {
        return [
            'user' => $request->user(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'My Account Verification' ;
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Update your account details such as name, email address and password';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [

            Link::make(__('Goto Back'))
                ->route('platform.profile')
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [

            Layout::block(LegalDocument01Layout::class)
                ->title(__('User Verify'))
                ->canSee($user->profile_verified == 0)
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.'))
                ->commands(
                    Button::make(__('Verify Your Account'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->method('Verify')
                ),

            Layout::block(LegalDocumen02tLayout::class)
                ->title(__('Business Verify'))
                ->canSee($user->profile_verified == 0 && $user->role == 'property-owner' )
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.'))
                ->commands(
                    Button::make(__('Verify Your Account'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->method('Verify')
                ),


            Layout::block(VerifyPendingLayout::class)
                ->title(__('Verify Legal Document'))
                ->canSee($user->profile_verified == 2)
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.')),


            Layout::block(VerifiedLayout::class)
                ->title(__('Account Status'))
                ->canSee($user->profile_verified == 1)
                ->description(__('A Role defines a set of tasks a user assigned the role is allowed to perform.')),

        ];
    }



    public function Verify(Request $request): void
    {
        $users = \App\Models\User::find($request->input('user.id'));

        $rules = [
            'user.profile_image' => 'required|image',
            'user.nic_or_passport_front_image' => 'required|image',
            'user.nic_or_passport_back_image' => 'required|image',
        ];


        $BusinessVerify = [
            'user.br_image' => 'required|image',
        ];


        if($users->role == 'property-owner'){
            $rules += $BusinessVerify;
        }

        $request->validate($rules);

        // profile Image
        $profile_image = $request->file('user.profile_image');
        $profile_image_db = $this->storeImage($profile_image,'ProfileImage');

        if($users->role == 'property-owner'){
            $br_image = $request->file('user.br_image');
            $br_image_db = $this->storeImage($br_image,'BusinessRegistrationDocument');
        }
        // profile Image

        // profile Image
        $nic_or_passport_front_image = $request->file('user.nic_or_passport_front_image');
        $nic_or_passport_front_image_db = $this->storeImage($nic_or_passport_front_image,'NIC');

        // profile Image
        $nic_or_passport_back_image = $request->file('user.nic_or_passport_back_image');
        $nic_or_passport_back_image_db = $this->storeImage($nic_or_passport_back_image,'NIC');

        $users = \App\Models\User::find($request->input('user.id'));

        $userData = [
            'br_image' => $br_image_db ?? 0,
            'nic_or_passport_front_image' => $nic_or_passport_front_image_db,
            'nic_or_passport_back_image' => $nic_or_passport_back_image_db ,
            'profile_image' => $profile_image_db,
            'profile_verified' => 2,
        ];

        $users->update($userData);

        $point = new PointStort();

        $point->user_id = $users->id;
        $point->point_count = 100;

        $point->save();


        Toast::info(__('Verify request sended. And sended point 100. '));
    }

    private function storeImage($image,$place)
    {
        $imageName = time() . random_int(1, 100) . '.' . $image->extension();

        switch ($place) {
            case 'ProfileImage':
                $image->move(public_path('User/ProfileImage'), $imageName);
                break;
            case 'BusinessRegistrationDocument':
                $image->move(public_path('User/BusinessRegistrationDocument'), $imageName);
                break;
            case 'NIC':
                $image->move(public_path('User/NIC'), $imageName);
                break;
        }


        return $imageName;

    }

}
