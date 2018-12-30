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
    return view('auth/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'],function(){
	Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
	Route::resource('kategori','KategoriController');
	Route::resource('ticket','TicketController');

	Route::get('/upload/kategori/excel','KategoriController@excel')->name('kategori.excel');
	Route::post('/upload/kategori/excel','KategoriController@upload')->name('kategori.upload.excel');

	Route::get('/transaction','TransactionController@index')->name('transaction.index');
	Route::post('/transaction','TransactionController@store')->name('transaction.store');
	Route::delete('/transaction/{id}','TransactionController@destroy')->name('transaction.destroy');

	Route::get('/transaction/update','TransactionController@update')->name('transaction.update');

	Route::get('/transaction/pdf','TransactionController@report')->name('transaction.report');
	Route::get('/excel','TransactionController@excel')->name('report.excel');
});













