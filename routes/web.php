<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\CodeSnippetController;
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
    Route::get('generatetoken', [ApiTokenController::class, 'update'])->name('update');
    Route::post('products/store', [ProductController::class, 'store'])->name('store');
    Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::patch('product/update/{product}', [ProductController::class, 'update'])->name('update');
    Route::get('products/create', [ProductController::class, 'create'])->name('create');
    Route::delete('products/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('products', [ProductController::class, 'index'])->name('index');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('show');
    Route::resource('codesnippets', CodeSnippetController::class);
    Route::get('/chat', 'App\Http\Controllers\ChatController@showChat')->name('chat.show');
    Route::post('/chat/message', 'App\Http\Controllers\ChatController@messageReceived')->name('chat.message');
});



Route::view('/game', 'game.show')->name('game.show');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
