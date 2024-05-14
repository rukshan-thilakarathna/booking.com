<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class UserListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'users';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        $cuser = \App\Models\User::find((Auth::user())->id);
        return [
            TD::make('name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (User $user) => new Persona($user->presenter())),

            TD::make('role', __('Role'))
                ->sort()
                ->filter(Input::make()),

            TD::make('email', __('Email'))
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('profile_verified', __('Status'))
                ->sort()
                ->canSee($cuser->hasAnyAccess(['user.verification.permissions']))
                ->render(function (User $user){
                    if ($user->profile_verified != 0 ){
                        return   DropDown::make(config('constants.PropertyOwnerVerificationStatus')[$user->profile_verified])
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Button::make(__('Verify this Account'))
                                    ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                    ->method('StatusChange', [
                                        'id' => $user->id,
                                        'status'=>1
                                    ]),
                                Button::make(__('Unverified this Account'))
                                    ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                    ->method('StatusChange', [
                                        'id' => $user->id,
                                        'status'=>0
                                    ]),
                                Button::make(__('Pending this Account'))
                                    ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                    ->method('StatusChange', [
                                        'id' => $user->id,
                                        'status'=>2
                                    ]),
                                Button::make(__('Black List this Account'))
                                    ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                    ->method('StatusChange', [
                                        'id' => $user->id,
                                        'status'=>3
                                    ]),
                                Button::make(__('Suspend this Account'))
                                    ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                    ->method('StatusChange', [
                                        'id' => $user->id,
                                        'status'=>4
                                    ]),
                            ]);
                    }else{
                        return config('constants.PropertyOwnerVerificationStatus')[$user->profile_verified];
                    }
                }),


            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->defaultHidden()
                ->sort(),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (User $user) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.systems.users.edit', $user->id)
                            ->canSee($cuser->hasAnyAccess(['user.edite.permissions']))
                            ->icon('bs.pencil'),

                        ModalToggle::make('View')
                            ->canSee($cuser->hasAnyAccess(['user.view.permissions']))
                            ->modal('View User')
                            ->icon('bs.eye')
                        ->asyncParameters([
                            'user'=>$user->id
                        ]),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->canSee($cuser->hasAnyAccess(['user.delete.permissions']))
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $user->id,
                            ]),
                    ])),
        ];
    }
}
