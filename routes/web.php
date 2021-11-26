<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;;
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

Route::get('/', [EquipmentController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users/{id}', [UserController::class, 'update'])->whereUuid('id');
Route::get('/users/reset', [UserController::class, 'showResetForm']);
Route::post('/users/reset', [UserController::class, 'resetPassword']);
Route::get('/equipments', [EquipmentController::class, 'index']);
Route::get('/equipments/{id}', [EquipmentController::class, 'details'])->whereUuid('id');
Route::get('/equipments/{id}/edit', [EquipmentController::class, 'edit'])->whereUuid('id');
Route::post('/equipments/{id}', [EquipmentController::class, 'update'])->whereUuid('id');
Route::delete('/equipments/{id}', [EquipmentController::class, 'destroy'])->whereUuid('id');
Route::delete('/tag/{equipment_id}/{tag_id}', [EquipmentController::class, 'deleteTag'])->whereUuid('equipment_id')->whereUuid('tag_id');
Route::post('/tag/{equipmentId}', [EquipmentController::class, 'addTag'])->whereUuid('equipment_id');
Route::get('/equipments/create', [EquipmentController::class, 'create']);
Route::put('/equipments/create', [EquipmentController::class, 'store']);
Route::post('/rental/create', [RentalController::class, 'store']);
Route::get('/rental/create/{equipment_id}', [RentalController::class, 'create'])->whereUuid('equipment_id');
Route::get('/rental/user/{user_id}', [RentalController::class, 'showUserRentals'])->whereUuid('equipment_id');
Route::get('/rental/{rental_id}/return',[RentalController::class, 'returnRental'])->whereUuid('rental_id');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
