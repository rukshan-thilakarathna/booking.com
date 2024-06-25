<?php

use App\Http\Controllers\web\DestinationsController;
use App\Http\Controllers\web\page\DetailController;
use App\Http\Controllers\web\page\IndexController;
use App\Http\Controllers\web\page\ListController;
use App\Http\Controllers\web\page\PropertyTypeDetailController;
use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;
use Orchid\Platform\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[IndexController::class ,'index'])->name('web.page.index');
Route::get('about-us', function () {return view('web.about-us');})->name('about-us');
Route::get('contact-us', function () {return view('web.contact-us');})->name('contact-us');
Route::get('list',[ListController::class ,'index'])->name('web.page.list');
Route::get('detail/{id}',[DetailController::class ,'index'])->name('web.page.detail');
Route::get('property-type-detail/{id}',[PropertyTypeDetailController::class ,'index'])->name('web.page.property-type-detail');

Route::get('/{role}/registration', [UserController::class ,'Registration'])->name('user.registration');
Route::post('/{role}/registration', [UserController::class ,'StoreUser'])->name('user.store');

Route::get('/messages', function () {
    return redirect('/chatify');
})->name('user.messages');

Route::get('/web/login', function () {
    return redirect('/dashboard/login');
})->name('web.login');

Route::get('/web/dashboard', function () {
    return redirect('/dashboard/main');
})->name('web.dashboard');

