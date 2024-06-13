<?php

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

Route::get('/', function () {
    return view('web.index');
});

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

