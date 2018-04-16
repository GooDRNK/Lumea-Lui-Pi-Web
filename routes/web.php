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
Route::post('/edit', 'HomeController@edit')->name('edit');
//Lumea Lui PI e pentru educational
Route::get('/registers/{email}/{pass}/{user}/', 'LumeaLuiPi@register');
Route::get('/pilogin/{pass}/{user}/', 'LumeaLuiPi@login');
Route::get('/pil/{len}','LumeaLuiPi@pil');
Route::get('/pi/{nr}','LumeaLuiPi@pi');
Route::get('/clasament','LumeaLuiPi@clasament');
Route::get('/score/{pass}/{user}/{rs1}/{rs2}/{rs3}/{rs4}/{rs5}/{rs6}/{rs7}/{rs8}/{rs9}/{rs10}/','LumeaLuiPi@score');
Route::get('/quiz/{pass}/{user}/{intr}/{check?}','LumeaLuiPi@GetIntr');
