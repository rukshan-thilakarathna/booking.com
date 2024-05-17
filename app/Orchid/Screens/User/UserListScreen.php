<?php

declare(strict_types=1);

namespace App\Orchid\Screens\User;

use App\Models\UserHasRoles;
use App\Orchid\Layouts\User\UserEditLayout;
use App\Orchid\Layouts\User\UserFiltersLayout;
use App\Orchid\Layouts\User\UserListLayout;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Menu;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class UserListScreen extends Screen
{

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {

        if (auth()->user()->IsIsRoot()) {
            return [

                'users' => User::with('roles', 'district', 'city')
                    ->filters(UserFiltersLayout::class)
                    ->defaultSort('id', 'desc')
                    ->paginate(),
            ];
        }else{
            return [
                'users' => User::with('roles', 'district', 'city')
                    ->filters(UserFiltersLayout::class)
                    ->where('role' ,'!=','root')
                    ->defaultSort('id', 'desc')
                    ->paginate(),
            ];
        }

    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'User Management';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive list of all registered users, including their profiles and privileges.';
    }

    public function permission(): ?iterable
    {
        return [
            'user.all.permissions',
            'user.view.permissions'
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->canSee($user->hasAnyAccess(['user.create.permissions']))
                ->route('platform.systems.users.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */

    public function layout(): iterable
    {
        return [
            UserFiltersLayout::class,
            UserListLayout::class,

            Layout::modal('asyncEditUserModal', UserEditLayout::class)
                ->async('asyncGetUser'),

            Layout::modal('View User',Layout::rows([
                Input::make('user.name')
                    ->type('text')
                    ->title(__('Name')),

                Input::make('user.url')
                    ->type('text')
                    ->title(__('Url')),

                Input::make('user.service')
                    ->type('text')
                    ->title(__('Service')),

                Input::make('user.email')
                    ->type('text')
                    ->title(__('Email')),

                Input::make('user.mobile_number')
                    ->type('text')
                    ->title(__('Mobile Number')),

                Input::make('user.district.name_en')
                    ->type('text')
                    ->title(__('district')),

                Input::make('user.city.name_en')
                    ->type('text')
                    ->title(__('City')),

                Input::make('user.address')
                    ->type('text')
                    ->title(__('Address')),

                Input::make('user.address')
                    ->type('text')
                    ->title(__('Address')),


            ]))->withoutApplyButton(true)->async('asyncGetUser')
        ];
    }

    /**
     * @return array
     */
    public function asyncGetUser(User $user): iterable
    {
        return [
            'user' => $user,
        ];
    }

    public function saveUser(Request $request, User $user): void
    {
        $request->validate([
            'user.email' => [
                'required',
                Rule::unique(User::class, 'email')->ignore($user),
            ],
        ]);

        $user->fill($request->input('user'))->save();

        Toast::info(__('User was saved.'));
    }

    public function remove(Request $request): void
    {
        User::findOrFail($request->get('id'))->delete();

        Toast::info(__('User was removed'));
    }

    public function StatusChange( Request $request)
    {
        $users = \App\Models\User::find($request->get('id'));

        $userData = [
            'profile_verified' => $request->get('status'),
        ];

        $users->update($userData);

        Toast::info(__(config('constants.PropertyOwnerVerificationStatus')[$request->get('status')]));
    }
}
