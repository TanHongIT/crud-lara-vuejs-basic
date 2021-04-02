<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('save_student', 'StudentController@save_student');
Route::get('all_students', 'StudentController@all_students');
Route::get('edit_student/{id}', 'StudentController@edit_student');
Route::put('update_student', 'StudentController@update_student');
Route::delete('delete_student/{id}', 'StudentController@delete_student');