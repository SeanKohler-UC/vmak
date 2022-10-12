<?php

use App\Address;
use App\Car;
use App\Owner;
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

Route::get('owner', 'OwnerController@index');
Route::get('owner/with/{with}', 'OwnerController@indexWith');
Route::get('owner/{owner}', 'OwnerController@show');
Route::get('owner/{owner}/with/{with}', 'OwnerController@showWith');
Route::post('owner', 'OwnerController@store');
Route::put('owner/{owner}', 'OwnerController@update');
Route::delete('owner/{owner}', 'OwnerController@delete');

Route::get('address', 'AddressController@index');
Route::get('address/with/{with}', 'AddressController@indexWith');
Route::get('address/{address}', 'AddressController@show');
Route::get('address/{address}/with/{with}', 'AddressController@showWith');
Route::post('address', 'AddressController@store');
Route::put('address/{address}', 'AddressController@update');
Route::delete('address/{address}', 'AddressController@delete');

Route::get('car', 'CarController@index');
Route::get('car/with/{with}', 'CarController@indexWith');
Route::get('car/{car}', 'CarController@show');
Route::get('car/{car}/with/{with}', 'CarController@showWith');
Route::post('car', 'CarController@store');
Route::put('car/{car}', 'CarController@update');
Route::delete('car/{car}', 'CarController@delete');

/** @uses \App\Http\Controllers\CountController::counts */
Route::get('counts/{tables}', "CountController@counts");

Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');
