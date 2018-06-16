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


Route::group(['prefix' => 'donor'], function () {

    Route::get('/', 'DonorController@index')->name('donor.index');
    Route::post('/', 'DonorController@store')->name('donor.store');
    Route::get('/{id}/edit', 'DonorController@edit')->name('donor.edit');
    Route::match(['get', 'put'], '/update/{id}', 'DonorController@update')->name('donor.update');;
    Route::delete('/{id}', 'DonorController@destroy')->name('donor.destroy');



    Route::get('/tabela', 'DonorController@getDataTable')->name('Donor.tabela');
    Route::get('/product/create/{id}', 'DonorController@doando')->name('Donor.Product.Show');//doando

    Route::get('/api/get', 'ApiController@getDonor')->name('donor.api.getDonor');
    Route::get('/api/get/product/{id}', 'ApiController@getDonorProduct')->name('donor.api.getDonorProduct');


});


Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@index');
    Route::get('/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/', 'ProductController@store')->name('product.store');
    Route::post('/{id}', 'ProductController@storeAdd')->name('product.storeAdd');

    Route::match(['get', 'put'], '/update/{id}', 'ProductController@update')->name('product.update');;
    Route::delete('/{id}', 'ProductController@destroy')->name('product.destroy');


    //API
    Route::post('/create/{id}', 'ProductController@RelacinarDonorProduct')->name('Product.RelacinarDonorProduct');
    Route::post('/create/', 'ProductController@addProduto')->name('Product.addProduto');
    Route::get('/api', 'ApiController@getDatableProduct')->name('Produto.Api.getDatableProduct');
    Route::get('/api/Doados/{id}',
        'ApiController@getDatableProductDoados')->name('Produto.Api.getDatableProductDoados');
});


Route::group(['prefix' => 'patient'], function () {


    Route::get('/', 'PatientController@index')->name('Patient.index');
    Route::post('/', 'PatientController@store')->name('patient.store');

    Route::get('/{id}/edit', 'PatientController@edit')->name('Patient.edit');

    Route::match(['get', 'put'], '/update/{id}', 'PatientController@update')->name('Patient.update');;
    Route::delete('/{id}', 'PatientController@destroy')->name('Patient.destroy');

    Route::get('/{id}/Doando', 'PatientController@doando')->name('Patient.doando');
    Route::post('/{id}/Doando', 'PatientController@doandoProduto')->name('Patient.relacionando');

    //API
    Route::get('/api', 'ApiController@getDatablePatient')->name('Patient.Api.getDatablePatient');


});

Route::group(['prefix' => 'reserve'], function () {


    Route::post('/', 'ReserveController@store')->name('Reseve.store');



});
