<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('ordini', 'OrdiniController');
Route::resource('user', 'UserController')->only(['edit', 'update']);
Route::get('ordini/pane/{anno}/{mese}/edit/{fornaio?}', 'PaneController@edit');
Route::post('ordini/pane/{anno}/{mese}', 'PaneController@update');
Route::get('ordini/compila/{id?}', 'OrdiniController@compila');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'gestore']], function () {
    Route::redirect('/', '/admin/stagioni');
    Route::get('stagioni', 'StagioniController@index');
    Route::get('stagioni/create', 'StagioniController@create');
    Route::post('stagioni', 'StagioniController@store');
    Route::get('stagioni/{stagione}/edit', 'StagioniController@edit');
    Route::put('stagioni/{stagione}', 'StagioniController@update');
    Route::post('stagioni/{stagione}/corrente', 'StagioniController@corrente');
    Route::get('associazioni', 'AssociazioniController@index');
    Route::get('associazioni/create', 'AssociazioniController@create');
    Route::post('associazioni', 'AssociazioniController@store');
    Route::get('associazioni/{id}/edit', 'AssociazioniController@edit');
    Route::put('associazioni/{id}', 'AssociazioniController@update');
    Route::delete('associazioni/{id}', 'AssociazioniController@destroy');
    Route::get('gas', 'GasController@index');
    Route::get('gas/create', 'GasController@create');
    Route::post('gas', 'GasController@store');
    Route::get('gas/{id}/edit', 'GasController@edit');
    Route::put('gas/{id}', 'GasController@update');
    Route::delete('gas/{id}', 'GasController@destroy');
    Route::get('fornai', 'FornaiController@index');
    Route::get('fornai/create', 'FornaiController@create');
    Route::post('fornai', 'FornaiController@store');
    Route::get('fornai/{id}/edit', 'FornaiController@edit');
    Route::put('fornai/{id}', 'FornaiController@update');
    Route::delete('fornai/{id}', 'FornaiController@destroy');
    Route::get('utenti', 'UtentiController@index');
    Route::get('utenti/create', 'UtentiController@create');
    Route::post('utenti', 'UtentiController@store');
    Route::get('utenti/{id}/edit', 'UtentiController@edit');
    Route::put('utenti/{id}', 'UtentiController@update');
    Route::delete('utenti/{id}', 'UtentiController@destroy');
});
