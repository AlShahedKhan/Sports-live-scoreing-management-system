<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/khelapagol', [App\Http\Controllers\KhelapagolController::class, 'index']);
Route::get('/cricket', [App\Http\Controllers\CricketController::class, 'index']);

Route::get('public_scores', [PublicController::class, 'view'])->name('dropdownView');
Route::get('get-states', [PublicController::class, 'getStates'])->name('getStates');
Route::get('get-graph', [PublicController::class, 'getGraph'])->name('getGraph');

Route::get('/migrate', function(){
    \Artisan::call('migrate');
    dd('migrated!');
});
