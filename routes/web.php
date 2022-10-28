<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'loginView')->name('login')->middleware('guest');
    Route::post('/login', 'login')->name('login-user')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware(['web'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [HomeController::class, 'view'])->name('home');

        Route::controller(MemberController::class)->name('members.')->prefix('members')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/import', 'import')->name('import');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
        });
    });
});
