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
Route::get('student', [App\Http\Controllers\StudentController::class ,'index']);
Route::post('student', [App\Http\Controllers\StudentController::class ,'index']);
// name là tên thay thế cho cả url
Route::match(['GET','POST'],'/student/add', [App\Http\Controllers\AddController::class ,'addstudent'])
    ->name('route_student_add');
Route::match(['GET','POST'],'/student/edit/{id}', [App\Http\Controllers\AddController::class ,'editstudent'])
    ->name('route_student_edit');
Route::get('student/delete/{id}', [App\Http\Controllers\StudentController::class ,'delete'])
    ->name('route_student_delete');
