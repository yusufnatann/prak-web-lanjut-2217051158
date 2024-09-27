<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController;

Route::get('/user/profile/{nama}/{kelas}/{npm}', [UserController::class, 'profile'])->name('profile');
Route::get('/user/create', [UserController::class, 'create'])->name('create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');