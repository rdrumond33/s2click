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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('donor', 'DonorController');
Route::get('/donor/tabela', 'DonorController@getDataTable')->name('Donor.tabela');
Route::get('/donor/product/create/{id}', 'DonorController@show')->name('Donor.Product.Show');


Route::get('/produto/adicionar', 'ProductController@create')->name('Product.create');

Route::post('/product/create/{id}', 'ProductController@RelacinarDonorProduct')->name('Product.RelacinarDonorProduct');

Route::post('/donor/product/create/{id}', 'ProductController@store')->name('Product.store');


Route::get('/patient', 'PatientController@index')->name('Patient.index');
Route::post('/patient', 'PatientController@store')->name('Patient.store');
Route::get('/patient/{id}/Doando', 'PatientController@doando')->name('Patient.doando');
Route::post('/patient/{id}/Doando', 'PatientController@doandoProduto')->name('Patient.relacionando');

//api

Route::get('/donor/api/get', 'ApiController@getDonor')->name('donor.api.getDonor');
Route::get('/donor/api/get/product/{id}', 'ApiController@getDonorProduct')->name('donor.api.getDonorProduct');
Route::get('/patient/api', 'ApiController@getDatablePatient')->name('Patient.Api.getDatablePatient');
Route::get('/Produto/api', 'ApiController@getDatableProduct')->name('Produto.Api.getDatableProduct');


//Route::get('/donor/api','DonorController@apiDonor')->name('api.Donor');

Route::get('/Produto/api/teste', 'ProductController@teste')->name('teste.Api');






