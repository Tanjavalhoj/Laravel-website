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

Route::get('/rapportSick', 'RapportSickController@index')->name('rapportSick');

/* URL og handler funktion*/

/*Routes er en 'dictionary' opslags bog, hvor den siger, 'når dette sker (/rapportSick), skal denne (RapportSickController@getST) funktion udføres'*/

Route::post('/rapportSick', 'RapportSickController@getST')->name('rapportSick');

Route::get('/teachers', 'TeacherController@index');