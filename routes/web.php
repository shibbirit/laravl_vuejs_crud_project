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


//Route::get('/teacher', 'TeacherController@index')->name('teacher');

Route::post('student/store', 'StudentController@store');

Route::post('teacher/add', 'TeacherController@store');

Route::get('teacher/data', 'TeacherController@index');
Route::put('teacher/udpate/data/{id}', 'TeacherController@update');

Route::delete('teacher/data/remove/{id}','TeacherController@destroy');

