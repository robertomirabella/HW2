<?php

use Illuminate\Support\Facades\Route;

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
})->name('home');

//login e sign up
Route::get('login_signup', "LoginController@login")->name('login_signup');
Route::post('login_signup', "LoginController@checkLogin");
Route::get("login_singup", "LoginController@logout")->name("logout");
Route::get('login_singup/controllo_cf/{q}', "LoginController@checkCf");
Route::get('login_singup/controllo_email/{q}',"LoginController@checkEmail");

//Animali
Route::get('animali',function () {
    return view('animali');
})->name('animali');
Route::get('animali/carica','AnimaliController@caricaAnimali');
Route::get('animali/preferiti/{tipo}/{value?}','AnimaliController@preferiti');
Route::get('animali/token','AnimaliController@token');

//Zoo
Route::get('zoo',function () {
    return view('zoo');
})->name('zoo');
Route::get('zoo/meteo/{q}','ZooController@meteo');
Route::get('zoo/carica','ZooController@caricaZoo');

//portale dipendenti
Route::get('portale_dipendenti', 'PortaleController@portale')->name('portale_dipendenti');
Route::get('portale_dipendenti/carica/{q?}', 'PortaleController@tabelle');
Route::get('portale_dipendenti/carica/recinti_in/{tipo}/{descrizione}', 'PortaleController@recinti_in');
Route::get('portale_dipendenti/carica/animali_acquatici_in/{specie}/{data}/{tipo}/{recinto}', 'PortaleController@acqua_in');
Route::get('portale_dipendenti/carica/animali_terrestri_in/{specie}/{data}/{peso}/{recinto}', 'PortaleController@terra_in');

?>

