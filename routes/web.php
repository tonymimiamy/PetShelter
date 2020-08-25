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
    return view('index');
});
Route::get('/editmember', function () {
    return view('editmember');
});



//CRUD
Route::get('/normalpets', 'PetsController@index');
Route::get('/normalpets/admin', 'PetsController@admin');
Route::get('/normalpets/useradmin', 'PetsController@useradmin');
Route::get('/normalpets/create', 'PetsController@create');
Route::get('/normalpets/show/{normalpet}', 'PetsController@show');
Route::get('/normalpets/{normalpet}', 'PetsController@show');
Route::get('/normalpets/{normalpet}/edit', 'PetsController@edit');
Route::post('/normalpetsComment', 'PetsController@saveComment');
Route::post('/normalpets', 'PetsController@store');
Route::delete('/normalpets/show/{comment}', 'PetsController@destroy');
Route::put('/normalpets/{normalpet}', 'PetsController@update');
Route::put('/normalpets/adopt/{normalpet}', 'PetsController@normalstatus');    
Route::put('/normalpets/approval/{normalpet}', 'PetsController@normalapproval');

Route::get('/publicpets', 'PublicPetsController@index');
Route::post('/publicpets', 'PublicPetsController@store');
Route::get('/publicpets/show/{publicpet}', 'PublicPetsController@show');


Route::get('/lostpets', 'LostPetsController@index');
Route::get('/lostpets/create', 'LostPetsController@create');
Route::get('/lostpets/show/{lostpet}', 'LostPetsController@show');
Route::get('/lostpets/{lostpet}', 'LostPetsController@show');
Route::get('/lostpets/{lostpet}/edit', 'LostPetsController@edit');
Route::post('/lostpets', 'LostPetsController@store');
Route::post('/lostpetsComment', 'LostPetsController@saveComment');
Route::delete('/lostpets/show/{comment}', 'LostPetsController@destroy');
Route::put('/lostpets/{lostpet}', 'LostPetsController@update');
Route::put('/lostpets/found/{lostpet}', 'LostPetsController@loststatus');
Route::put('/lostpets/approval/{lostpet}', 'LostPetsController@lostapproval');

Route::get('/tools', 'ToolsController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editmember', 'ProfilesController@index');
Route::put('/editmember','ProfilesController@update');

