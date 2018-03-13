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

Route::get('/students/list','StudentController@index');

Route::get('/students/insert','StudentController@insert');

Route::get('/students/edit/{id}','StudentController@edit');

Route::post('/students/save','StudentController@save');

Route::get('/students/delete/{id}','StudentController@delete');

Route::post('/students/update','StudentController@update');

//-----------------------------Ajax------------------------

Route::get('students','AjaxController@index');

Route::get('/students/read-data','AjaxController@readData');

Route::post('/students/store','AjaxController@store');

Route::post('/students/destroy','AjaxController@destroy');

Route::get('/students/edit','AjaxController@edit');

Route::post('/students/update','AjaxController@update');



