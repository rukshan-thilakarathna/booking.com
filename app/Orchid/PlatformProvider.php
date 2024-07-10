<?php

declare(strict_types=1);

namespace App\Orchid;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Button;
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
        $pointok = \App\Models\PointStort::where('user_id', (Auth::user())->id)->count();
        return [
            Menu::make(__('Properties'))
                ->canSee($user->profile_verified == 1 || ($user->role == 'root' || $user->role == 'admin' || $user->role == 'superadmin '))
                ->permission('property.view.permissions')
                ->route('properties'),

            Menu::make(__('Bookings'))
                ->canSee($user->hasAnyAccess(['view.booking.permissions']))
                ->route('bookings'),

            Menu::make(__('Points'))
                ->canSee($pointok >0)
                ->permission('point.permissions')
                ->route('points'),

            Menu::make(__('Report'))
                ->permission('link.permissions')
                ->route('reports'),

            Menu::make(__('Reviews'))
                ->permission('review.permissions')
                ->route('reviews'),

            Menu::make(__('Profile'))
                ->route('platform.profile'),

            Menu::make(__('WebSite'))
                ->route('web.page.index'),

            Menu::make(__('Messages'))
                ->route('user.messages'),

            Menu::make(__('Users'))
                ->route('platform.systems.users')
                ->permission(['user.all.permissions','user.view.permissions'])
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
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

            ItemPermission::group(__('Review Permissions Manage'))
                ->addPermission('review.permissions', __('review'))
                ->addPermission('review.reply.permissions', __('Review Reply'))
                ->addPermission('review.show.hidden.permissions', __('Review Show And Hidden')),

            ItemPermission::group(__('Report Permissions Manage'))
                ->addPermission('link.permissions', __('link')),

            ItemPermission::group(__('Room Type Permissions Manage'))
                ->addPermission('create.room.type.permissions', __('Create,View,Edit And Delete')),

            ItemPermission::group(__('Booking Permissions Manage'))
                ->addPermission('main.permissions', __('main'))
                ->addPermission('create.booking.permissions', __('Create'))
                ->addPermission('edit.booking.permissions', __('Edit'))
                ->addPermission('view.booking.permissions', __('View'))
                ->addPermission('cancel.booking.permissions', __('Cancel'))
                ->addPermission('payment.booking.permissions', __('payment'))
                ->addPermission('checkOut.booking.permissions', __('CheckOut')),

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
