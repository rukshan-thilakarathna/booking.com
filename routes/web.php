<?php

use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Web.index');
});

Route::get('/{role}/registration', [UserController::class ,'Registration'])->name('user.registration');
Route::post('/{role}/registration', [UserController::class ,'StoreUser'])->name('user.store');
Route::get('/messages', function () {
    return redirect('/chatify');
})->name('user.messages');

