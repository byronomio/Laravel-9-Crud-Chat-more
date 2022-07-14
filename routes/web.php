<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LanguageController;

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

// Auth::routes();
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::get('/feedback', [HomeController::class, 'feedback'])->name('feedback');
    Route::get('/help', [HomeController::class, 'help'])->name('help');
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('layouts/blank', [HomeController::class, 'layout_blank'])->name('layout-blank');
    Route::get('online-users', [UsersController::class, 'index'])->name('showAll');
    Route::get('chat', [ChatController::class, 'index'])->name('chat');
    Route::resource('games', GameController::class);
    // Route::get('games/create', [GameController::class, 'create'])->name('create');
    // Route::post('games', [GameController::class, 'store'])->name('store');


// Route::view('users', 'users.showAll')->name('users.all');

Route::get('/chat', 'App\Http\Controllers\ChatController@showChat')->name('chat.show');

Route::post('/chat/message', 'App\Http\Controllers\ChatController@messageReceived')->name('chat.message');


});





// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
