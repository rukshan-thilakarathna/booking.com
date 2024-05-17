<?php

declare(strict_types=1);

namespace App\Orchid;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);
        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        $user = \App\Models\User::find((Auth::user())->id);
        return [
            Menu::make(__('Properties'))
                ->icon('bs.people')
                ->canSee($user->profile_verified == 1 || ($user->role == 'root' || $user->role == 'admin' || $user->role == 'superadmin '))
                ->permission('property.view.permissions')
                ->route('properties'),

            Menu::make(__('Points'))
                ->icon('bs.people')
                ->permission('point.permissions')
                ->route('points'),

            Menu::make(__('Profile'))
                ->icon('bs.people')
                ->route('platform.profile'),

            Menu::make(__('Users'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission(['user.all.permissions','user.view.permissions'])
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('role.permissions')
                ->divider(),

        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('Roles Permissions Manage'))
                ->addPermission('role.permissions', __('Manage Roles')),

            ItemPermission::group(__('Users Permissions Manage'))
                ->addPermission('user.create.permissions', __('Create Users'))
                ->addPermission('user.edite.permissions', __('Edit Users'))
                ->addPermission('user.verification.permissions', __('Verification Users'))
                ->addPermission('user.update_password.permissions', __('Update User Password '))
                ->addPermission('user.view.permissions', __('View Users'))
                ->addPermission('user.delete.permissions', __('Delete Users')),

            ItemPermission::group(__('Points Permissions Manage'))
                ->addPermission('point.permissions', __('Use Point'))
                ->addPermission('point.donations.permissions', __('Point Donations'))
                ->addPermission('point.Sell.permissions', __('Point Sell')),



            ItemPermission::group(__('Property Permissions Manage'))
                ->addPermission('property.create.permissions', __('Create Property'))
                ->addPermission('property.edite.permissions', __('Edit Property'))
                ->addPermission('property.approve.permissions', __('Approve Property'))
                ->addPermission('property.suspend.permissions', __('Suspend Property'))
                ->addPermission('property.status.permissions', __('status Change Property'))
                ->addPermission('property.admin_create.permissions', __('Admin Create Property'))
                ->addPermission('property.view.permissions', __('View Property'))
                ->addPermission('property.delete.permissions', __('Delete Property')),

        ];
    }
}
