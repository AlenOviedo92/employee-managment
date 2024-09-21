<?php
// En este archivo defino las rutas que va a utilizar mi aplicación
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\DepartmentsController;

Route::get('/', [EmployeesController::class, 'create'])->name('home');

Route::get('/empleados', [EmployeesController::class, 'index'])->name('employees');

Route::post('/empleados', [EmployeesController::class, 'store'])->name('employees');

Route::get('/empleados/{id}', [EmployeesController::class, 'show'])->name('employees-edit');

Route::patch('/empleados/{id}', [EmployeesController::class, 'update'])->name('employees-update');

Route::delete('/empleados/{id}', [EmployeesController::class, 'destroy'])->name('employees-destroy');

Route::get('/employees/all', [EmployeesController::class, 'allEmployees'])->name('employees-all');

Route::resource('departments', DepartmentsController::class);