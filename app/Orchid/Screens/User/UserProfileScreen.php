<?php

declare(strict_types=1);

namespace App\Orchid\Screens\User;

use App\Orchid\Layouts\User\ContactLayout;
use App\Orchid\Layouts\User\LegalDocumen02tLayout;
use App\Orchid\Layouts\User\LegalDocument01Layout;
use App\Orchid\Layouts\User\LocationLayout;
use App\Orchid\Layouts\User\ProfilePasswordLayout;
use App\Orchid\Layouts\User\ServiceLayout;
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

class UserProfileScreen extends Screen
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
        return 'My Account';
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

            Link::make(__('Verify Your Account'))
                ->route('platform.systems.users.verification',[$user->url])
                ->canSee($user->profile_verified == 0),


            Button::make(config('constants.PropertyOwnerVerificationStatus')[$user->profile_verified])
                ->novalidate()
                ->canSee(  $user->profile_verified != 0)
                ->method('otherStatus'),

            Button::make('Sign out')
                ->novalidate()
                ->icon('bs.box-arrow-left')
                ->route('platform.logout'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [

            Layout::block(UserEditLayout::class)
                ->title(__('Profile Information'))
                ->description(__("Update your account's profile information and email address."))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC())
                        ->icon('bs.check-circle')
                        ->method('save')
                ),


            Layout::block(ServiceLayout::class)
                ->title(__('Service Information'))
                ->description(__("Update your account's profile information and email address."))
                ->canSee($user->role=='worker')
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC())
                        ->icon('bs.check-circle')
                        ->method('SaveLocation')
                ),

            Layout::block(LocationLayout::class)
                ->title(__('Location Information'))
                ->description(__("Update your account's profile information and email address."))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC())
                        ->icon('bs.check-circle')
                        ->method('SaveLocation')
                ),

            Layout::block(ContactLayout::class)
                ->title(__('Contact Information'))
                ->description(__("Update your account's profile information and email address."))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC())
                        ->icon('bs.check-circle')
                        ->method('SaveLocation')
                ),

            Layout::block(ProfilePasswordLayout::class)
                ->title(__('Update Password'))
                ->description(__('Ensure your account is using a long, random password to stay secure.'))
                ->commands(
                    Button::make(__('Update password'))
                        ->type(Color::BASIC())
                        ->icon('bs.check-circle')
                        ->method('changePassword')
                ),


        ];
    }

    public function SaveLocation(Request $request): void
    {
        $users = \App\Models\User::find($request->input('user.id'));
        $userData = [
            'main_location' => $request->input('user.main_location') ?? '' ,
            'sub_location' => $request->input('user.sub_location') ?? '' ,
            'address' => $request->input('user.address') ?? '' ,
            'mobile_number' => $request->input('user.mobile_number') ?? '' ,
            'service' => $request->input('user.service') ?? '' ,
        ];

        $users->update($userData);

        Toast::info(__(' saved'));
    }

    public function save(Request $request): void
    {

        $request->validate([
            'user.name'  => 'required|string',
            'user.email' => [
                'required',
                Rule::unique(User::class, 'email')->ignore($request->user()),
            ],

        ]);

        $request->user()
            ->fill($request->get('user'))
            ->save();

        Toast::info(__('Profile updated.'));
    }

    public function otherStatus()
    {
        $user = \App\Models\User::find((Auth::user())->id);
        Toast::info(__(config('constants.PropertyOwnerVerificationStatus')[$user->profile_verified].' Your Account'));
    }
    public function changePassword(Request $request): void
    {
        $guard = config('platform.guard', 'web');
        $request->validate([
            'old_password' => 'required|current_password:'.$guard,
            'password'     => 'required|confirmed|different:old_password',
        ]);

        tap($request->user(), function ($user) use ($request) {
            $user->password = Hash::make($request->get('password'));
        })->save();

        Toast::info(__('Password changed.'));
    }
}
