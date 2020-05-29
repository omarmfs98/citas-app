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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('especialidads', 'EspecialidadController');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('specialties', 'SpecialtyController');

Route::resource('secures', 'SecureController');

Route::resource('pacientes', 'PacienteController');

Route::resource('schedules', 'ScheduleController');

Route::resource('doctors', 'DoctorController');

Route::resource('citas', 'CitaController');