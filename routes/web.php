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

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Landing page for successful login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('dashboard.index');

// Department

//Get Requests
Route::get("/department",'DepartmentController@index')->name('department.index');
Route::get("/department/edit/{id}",'DepartmentController@edit')->name('department.edit');
Route::get("/department/delete/{id}",'DepartmentController@show')->name('department.show');

//Post Requests
Route::post("/department",'DepartmentController@store')->name('department.index');
Route::post("/department/edit/{id}",'DepartmentController@update_record')->name('department.edit');

// Delete Request
Route::delete("/department/delete/{id}",'DepartmentController@destroy');

// End of Department


// Start of Employee

// Get Request
Route::get("/employee",'EmployeeController@index')->name('employee.index');

Route::get("/employee/create",'EmployeeController@create')->name('employee.create');

Route::get("/employee/single/{id}","EmployeeController@single")->name("employee.single");

Route::get("/employee/edit/{id}","EmployeeController@edit")->name("employee.edit");

Route::get("/employee/delete/{id}","EmployeeController@show")->name("employee.delete");

Route::get("/employee/pay/{id}","EmployeeController@pay")->name("employee.pay");

//Post Request
Route::post("/employee/create","EmployeeController@store");

Route::post("/employee/edit/{id}","EmployeeController@update_record")->name("employee.edit");

Route::post("/employee/pay/{id}","PaymentReportController@create");

// Delete

Route::delete("/employee/delete/{id}","EmployeeController@destroy");

// End of Department

//Start of Payment Report

//Get
Route::get("/report","PaymentReportController@index")->name('report.index');


//Post
Route::post("/report","PaymentReportController@show");




