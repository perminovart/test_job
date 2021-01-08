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

Route::post('/', function () {return view('welcome');})->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\PlateController@getPage')->name('getPage');
Auth::routes();

Route::group(['middleware' => ['auth']], function () 
{
    Route::post('/delete', 'App\Http\Controllers\PlateController@deletePlate')->name('deletePlate');
    Route::get('/edit/{id}', 'App\Http\Controllers\PlateController@getPlate')->name('getPlate');
    Route::post('/edit','App\Http\Controllers\PlateController@editPlate')->name('editPlate');
    Route::post('/add', 'App\Http\Controllers\PlateController@addPlate')->name('addPlate'); 
});

