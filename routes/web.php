<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/new', [MemeController::class, 'create']);
Route::post('/', [MemeController::class, 'store']);
Route::get('/{meme}', [HomeController::class, 'show']);
Route::get('/', [HomeController::class, 'index']);
