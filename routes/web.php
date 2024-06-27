<?php

use App\Http\Controllers\adminControllers\adminController;
use App\Http\Controllers\employeeControllers\employeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});


Route::match(['get', 'post'], 'admin/login', [adminController::class, 'login']);
Route::group(['middleware' => ['admin']], function () {
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {

            return redirect('admin/dashboard');
        })->name('dashboard');
    });
    Route::prefix('/admin')->group(function () {
        Route::get('dashboard', [adminController::class, 'dashboard']);
        Route::match(['get', 'post'], 'updatePassword', [adminController::class, 'updatePassword']);
        Route::match(['get', 'post'], 'updateDetails', [adminController::class, 'updateDetails']);
        Route::post('checkCurrentPassword', [adminController::class, 'checkCurrentPassword']);
        //view
        Route::get('viewEmployee', [adminController::class, 'viewEmployee'])->name('viewEmployee');
        //add
        Route::get('addEmployee', [adminController::class, 'addEmployee'])->name('addEmployee');
        //store
        Route::post('employee/storeEmployee', [adminController::class, 'storeEmployee'])->name('storeEmployee');
        //delete
        Route::delete('employee/{id}/deleteEmployee', [adminController::class, 'deleteEmployee'])->name('deleteEmployee');
        //edit
        Route::get('employee/{id}/editEmployee', [adminController::class, 'editEmployee']);
        //update
        Route::put('employee/{id}/updateEmployee', [adminController::class, 'updateEmployee'])->name('updateEmployee');

        Route::get('viewTask', [adminController::class, 'viewTask'])->name('viewTask');
        //add
        Route::get('task/{id}/addTask', [adminController::class, 'addTask'])->name('addTask');
        //store
        Route::put(' task/{id}/storeTask', [adminController::class, 'storeTask'])->name('storeTask');
        //delete
        Route::delete('task/{id}/deleteTask', [adminController::class, 'deleteTask'])->name('deleteTask');

        Route::get('viewSubmittedTask', [adminController::class, 'viewSubmittedTask'])->name('viewSubmittedTask');

        //view file
        Route::get('taskFileView/{id}', [adminController::class, 'fileView']);
        //download file
        Route::get('taskFileDownload/{file}', [adminController::class, 'fileDownload']);

        Route::get('/mailForm', [adminController::class, 'mailForm'])->name('mailForm');
        Route::post('/sendMail', [adminController::class, 'sendMail'])->name('sendMail');
        Route::get('logout', [adminController::class, 'logout']);
    });
});

Route::prefix('/employee')->group(function () {
    Route::match(['get', 'post'], 'loginEmployee', [employeeController::class, 'loginEmployee']);


    Route::group(['middleware' => ['employee']], function () {
        Route::get('employeeDashboard', [employeeController::class, 'employeeDashboard']);
        Route::get('viewTask', [employeeController::class, 'viewTask']);
        Route::post('storeEmployeeTask/{id}/add', [employeeController::class, 'storeEmployeeTask'])->name('storeEmployeeTask');
        Route::get('viewEmployeeDetail', [employeeController::class, 'viewEmployeeDetail'])->name('viewEmployeeDetail');

        Route::get('logout', [employeeController::class, 'logout']);
    });
});
