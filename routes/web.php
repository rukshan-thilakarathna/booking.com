<?php

use App\Http\Controllers\web\DestinationsController;
use App\Http\Controllers\web\page\BookingConforumController;
use App\Http\Controllers\web\page\DetailController;
use App\Http\Controllers\web\page\IndexController;
use App\Http\Controllers\web\page\ListController;
use App\Http\Controllers\web\page\PointController;
use App\Http\Controllers\web\page\PropertyTypeDetailController;
use App\Http\Controllers\web\UserController;
use App\Http\Controllers\web\WishListController;
use App\Mail\smsMail;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
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
Route::get('points-buy',[PointController::class,'index'])->name('points.buy');
Route::get('contact-us', function () {return view('web.contact-us');})->name('contact-us');
Route::get('list',[ListController::class ,'index'])->name('web.page.list');
Route::get('detail/{id}',[DetailController::class ,'index'])->name('web.page.detail');
Route::get('user/add-wishlist/{id}',[WishListController::class ,'index'])->name('web.add-wishlist');
Route::get('property-type-detail/{id}',[PropertyTypeDetailController::class ,'index'])->name('web.page.property-type-detail');
Route::get('Booking-confourm/{id}/{chackIn}/{chackOut}/{adults}/{children}',[BookingConforumController::class ,'index'])->name('web.booking.confourm');

Route::post('/get-points' ,[PointController::class ,'buy'])->name('get-point');
Route::redirect('post-property','/dashboard/properties')->name('post-property');

Route::get('/{role}/registration', [UserController::class ,'Registration'])->name('user.registration');

Route::get('/forgot-password', [UserController::class ,'forgotPassword'])->name('user.forgot.password');
Route::post('/forgot-password', [UserController::class ,'forgotPasswordSend'])->name('user.forgot.password.post');
Route::post('/{role}/registration', [UserController::class ,'StoreUser'])->name('user.store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/messages', function () {
    return redirect('/chatify');
})->name('user.messages');

Route::get('/web/login', function () {
    return redirect('/dashboard/main');
})->name('web.login');

Route::get('/web/dashboard', function () {
    return redirect('/dashboard/main');
})->name('web.dashboard');


Route::get('deleteImage/{image}/{dbname?}', [IndexController::class, 'deleteImage'])->name('DeleteImage');

Route::get('/email-verification/{token}/{email}', [UserController::class ,'emailVerification'])->name('user.email.verification');

http://localhost:8000/email-verification/%242y%2412%24GCjXIlzTDcBkdcMgbQHZ0.FTG2uhn5VlJF/rlGp0eUzzkQ50K8pjO/thilakarathnarukshan9@gmail.com