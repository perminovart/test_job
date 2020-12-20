<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlateController;
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

Route::post('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\PlateController@allDate')->name('plateDate');
Route::get('delete/{id}', 'App\Http\Controllers\PlateController@deletePlate')->name('deletePlate');
Route::get('/edit/{id}', 'App\Http\Controllers\PlateController@editDate')->name('editDate');
Route::post('/edit/{id}', 'App\Http\Controllers\PlateController@editPlate')->name('editPlate');
Route::post('/add', 'App\Http\Controllers\PlateController@AddPlate')->name('addDB');
Route::post('/update', 'App\Http\Controllers\PlateController@updatePlate')->name('updateDB');

