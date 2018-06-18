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

Auth::routes();

Route::get('/', function () {
	if (Auth::check()) {
		return view('dashboard');
	} else {
		return redirect()->route('login');
	}
});

Route::get('/api/clienti', 'Api\ClienteController@getAll');
Route::get('/api/clienti/count', 'Api\ClienteController@getCount');
Route::get('/api/clienti/lasts/{limit?}', 'Api\ClienteController@getLasts');
Route::post('/api/cliente/save', 'Api\ClienteController@postSave');
