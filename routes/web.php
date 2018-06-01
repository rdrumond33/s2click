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

Route::get('api/donor','DonorController@apiDonor')->name('api.Donor');


Route::get('/donor','DonorController@index')->name('Donor.index');
Route::get('/donor/tabela','DonorController@getDataTable')->name('Donor.tabela');

Route::get('/donor/create','DonorController@create')->name('Donor.create');
Route::post('/donor/create','DonorController@store')->name('Donor.store');
Route::get('/donor/product/create/{id}','DonorController@show')->name('Donor.Product.Show');




Route::get('/product/create/{id}','ProductController@create')->name('Product.create');
Route::post('/product/create/{id}','ProductController@RelacinarDonorProduct')->name('Product.RelacinarDonorProduct');
Route::post('/donor/product/create/{id}','ProductController@store')->name('Product.store');





Route::get('/patient','PatientController@index')->name('Patient.index');
Route::post('/patient','PatientController@store')->name('Patient.store');
Route::get('/patient/{id}/Doando','PatientController@doando')->name('Patient.doando');
Route::post('/patient/{id}/Doando','PatientController@doandoProduto')->name('Patient.relacionando');

//api
Route::get('/patient/pacientes','PatientController@getDatable')->name('Patient.Api');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
