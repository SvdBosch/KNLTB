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



/* Routes 'Wedstrijden' */
Route::get('/scheme', 'gameController@index')->name('scheme');
Route::get('/', 'gameController@index');
Route::get('/scheme/generate/{competition_id}', 'gameController@generate');

/* Routes 'Standen' */
Route::get('/standings', 'ScoreController@index')->name('standings');

/* Routes 'Results' */
Route::get('/results/create/{id}', 'ResultsController@create');
Route::post('/results/store/{id}', 'ResultsController@store');

/* Routes 'Deelnemers' */
Route::get('/participants', 'ParticipantsController@index')->name('participants');
Route::get('/participants/delete/{id}', 'ParticipantsController@destroy');


/* Routes 'Standen overzicht' */
//Route::resource('participants', 'ParticipantsController');

//Route::post('/participants/delete/{id}', 'ParticipantsController@delete');