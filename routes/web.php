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

Route::get('/donor','DonorController@index')->name('Donor.index');
Route::get('/donor/create','DonorController@create')->name('Donor.create');
Route::post('/donor/create','DonorController@store')->name('Donor.store');
Route::get('/donor/{id}/Product','DonorController@show')->name('Donor.show');


Route::get('/produto','ProductController@index')->name('Product.index');
Route::get('/product/create/{id}','ProductController@create')->name('Product.create');
Route::post('/product/create/{id}','ProductController@store')->name('Product.store');





Route::get('/patient','PatientController@index');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
