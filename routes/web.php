<?php

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
Route::get('/donor',['uses'=>'DonorController@index','as']);
Route::get('/donor','DonorController@index')->name('Donor.home');
Route::get('/donor/create','DonorController@create')->name('Donor.create');
Route::post('/donor','DonorController@store')->name('Donor.store');
Route::post('/donor','DonorController@store')->name('Donor.store');


Route::get('/stock','StockController@index');
Route::get('/stock','StockController@create')->name('Stock.create');





Route::get('/patient','PatientController@index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
