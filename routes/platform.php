<?php

declare(strict_types=1);

use App\Orchid\Screens\Booking\BookingAvailableListScreen;
use App\Orchid\Screens\Booking\BookingCardsScreen;
use App\Orchid\Screens\Booking\BookingEditScreen;
use App\Orchid\Screens\Booking\BookingListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Point\AmountDueListScreen;
use App\Orchid\Screens\Point\DonationsListScreen;
use App\Orchid\Screens\Point\PointListScreen;
use App\Orchid\Screens\Point\SellListScreen;
use App\Orchid\Screens\Property\PropertyCreateAndEditScreen;
use App\Orchid\Screens\Property\PropertyListScreen;
use App\Orchid\Screens\Reports\ReportScreen;
use App\Orchid\Screens\Review\GuesrReviewListScreen;
use App\Orchid\Screens\Review\PropertyReviewListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Rooms\RoomCardsScreen;
use App\Orchid\Screens\Rooms\RoomEditScreen;
use App\Orchid\Screens\Rooms\RoomsCalendarListScreen;
use App\Orchid\Screens\Rooms\RoomsListScreen;
use App\Orchid\Screens\RoomType\RoomTypeCardsScreen;
use App\Orchid\Screens\RoomType\RoomTypesEditScreen;
use App\Orchid\Screens\RoomType\RoomTypesListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\User\UserVerificationScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

//user//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

Route::screen('users/{user}/verification',UserVerificationScreen::class)
    ->name('platform.systems.users.verification')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.profile')
        ->push('Verification', route('platform.systems.users.verification', $user)));

Route::screen('users/{user}/view', UserEditScreen::class)
    ->name('platform.systems.users.view')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.view')
        ->push($user->name, route('platform.systems.users.view', $user)));

Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));


//role//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));


//properties////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('properties',PropertyListScreen::class)
    ->name('properties')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('properties'), route('properties')));

Route::screen('property/create',PropertyCreateAndEditScreen::class)
    ->name('property.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('properties')
        ->push(__('Create'), route('property.create')));

Route::screen('property/{property}/edit',PropertyCreateAndEditScreen::class)
    ->name('property.edit')
    ->breadcrumbs(fn (Trail $trail, $property) => $trail
        ->parent('properties')
        ->push($property->name, route('property.edit', $property)));


//Points////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::screen('points',PointListScreen::class)
    ->name('points')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('points'), route('points')));

Route::screen('donations-points',DonationsListScreen::class)
    ->name('point.donations')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('points')
        ->push(__('Donations'), route('points')));

Route::screen('sell-points',SellListScreen::class)
    ->name('point.sell')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('points')
        ->push(__('Sell Your Points'), route('points')));

Route::screen('amount-due',AmountDueListScreen::class)
    ->name('amount.due')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('points')
        ->push(__('Amount Due'), route('points')));


//Reviews////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('reviews-for-your-property',PropertyReviewListScreen::class)
    ->name('reviews')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Reviews for your property'), route('reviews')));

Route::screen('the-reviews-you-leave-for-guests',GuesrReviewListScreen::class)
    ->name('guest-reviews')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('The reviews you leave for guests'), route('reviews')));


//Room Types////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('room-types',RoomTypesListScreen::class)
    ->name('room-types')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('properties')
        ->push(__('Room Types'), route('room-types')));

Route::screen('room-types/{room_type_id}/view',RoomTypeCardsScreen::class)
    ->name('room-types-view')
    ->breadcrumbs(fn (Trail $trail, $room_type_id) => $trail
        ->parent('room-types')
        ->push('View', route('room-types-view', $room_type_id)));

Route::screen('room-type/{room_type}/edit',RoomTypesEditScreen::class)
    ->name('room-types-edit')
    ->breadcrumbs(fn (Trail $trail, $room_type) => $trail
        ->parent('room-types')
        ->push('Edit', route('room-types-edit', $room_type)));

//Rooms/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::screen('room-types/{room_type_id}/rooms',RoomsListScreen::class)
    ->name('room')
    ->breadcrumbs(fn (Trail $trail, $room_type_id) => $trail
        ->parent('room-types')
        ->push('Rooms', route('room', $room_type_id)));

Route::screen('room/{room_id}/view',RoomCardsScreen::class)
    ->name('room-view');

Route::screen('room/{room_id}/edit',RoomEditScreen::class)
    ->name('room-edit');


//Booking///////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('bookings',BookingListScreen::class)
    ->name('bookings')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Bookings'), route('bookings')));

Route::screen('bookings/{id}/update',BookingEditScreen::class)
    ->name('bookings-update')
    ->breadcrumbs(fn (Trail $trail,$id) => $trail
        ->parent('platform.index')
        ->push(__('Update'), route('bookings-update',$id)));

Route::screen('bookings/available',BookingAvailableListScreen::class)
    ->name('bookings-available')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('bookings')
        ->push(__('Available Rooms'), route('bookings-available')));

Route::screen('bookings/{id}/view',BookingCardsScreen::class)
    ->name('bookings-view')
    ->breadcrumbs(fn (Trail $trail,$id) => $trail
        ->parent('platform.index')
        ->push(__('View'), route('bookings-view',$id)));


//Reports///////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('reports',ReportScreen::class)
    ->name('reports')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Reports'), route('reports')));


//Calendar///////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::screen('calendar/{id}',RoomsCalendarListScreen::class)
    ->name('calendar');









