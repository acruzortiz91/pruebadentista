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


Route::get('/', 'HomeController@index')->name('index');

Route::get('/', function(){
    return view('home');
})->middleware('auth');


Route::get('/admin/patients', 'Admin\PatientsController@index')->name('admin.patients.index');
Route::post('/admin/patients/store', 'Admin\PatientsController@store')->name('admin.patients.store');
Route::post('/admin/patients/{id}/update', 'Admin\PatientsController@update')->name('admin.patients.update');
Route::delete('/admin/patients/{id}/delete', 'Admin\PatientsController@delete')->name('admin.patients.delete');


Route::get('/admin/doctors', 'Admin\DoctorsController@index')->name('admin.doctors.index');
Route::post('/admin/doctors/store', 'Admin\DoctorsController@store')->name('admin.doctors.store');
Route::post('/admin/doctors/{id}/update', 'Admin\DoctorsController@update')->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}/delete', 'Admin\DoctorsController@delete')->name('admin.doctors.delete');


Route::get('/admin/consultations', 'Admin\ConsultationsController@index')->name('admin.consultations.index');
Route::post('/admin/consultations/store', 'Admin\ConsultationsController@store')->name('admin.consultations.store');
Route::post('/admin/consultations/{id}/update', 'Admin\ConsultationsController@update')->name('admin.consultations.update');
Route::delete('/admin/consultations/{id}/delete', 'Admin\ConsultationsController@delete')->name('admin.consultations.delete');

Auth::routes();