<?php

declare(strict_types=1);

namespace App\Orchid;

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
        return [
            Menu::make(__('Properties'))
                ->icon('bs.people')
                ->permission('property.view.permissions')
                ->route('properties'),


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
                ->addPermission('user.update_password.permissions', __('Update User Password '))
                ->addPermission('user.view.permissions', __('View Users'))
                ->addPermission('user.delete.permissions', __('Delete Users')),


            ItemPermission::group(__('Property Permissions Manage'))
                ->addPermission('property.create.permissions', __('Create Property'))
                ->addPermission('property.edite.permissions', __('Edit Property'))
                ->addPermission('property.status.permissions', __('Update Status Property'))
                ->addPermission('property.admin_create.permissions', __('Admin Create Property'))
                ->addPermission('property.view.permissions', __('View Property'))
                ->addPermission('property.delete.permissions', __('Delete Property')),

        ];
    }
}
