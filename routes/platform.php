<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Pount\PointListScreen;
use App\Orchid\Screens\Property\PropertyCreateAndEditScreen;
use App\Orchid\Screens\Property\PropertyListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
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




