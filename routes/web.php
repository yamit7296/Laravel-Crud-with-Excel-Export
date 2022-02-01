<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\Employee;
use App\Http\Controllers\EmployeesController;
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
    return redirect('/Employee');
});

Route::get('/Employee/Export', [EmployeesController::class, 'uploadFile']);
Route::post('/Employee/Export', [EmployeesController::class, 'uploadFilePost'])->name('employee.upload');
Route::resource('Employee', EmployeesController::class);

// Route::get('/Export', function(){
//     echo "<h1>This is export module</h1>";

// });
