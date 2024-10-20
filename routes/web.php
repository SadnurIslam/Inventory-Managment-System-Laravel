<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\LoginCheck;


Route::middleware(LoginCheck::class)->group(function () {
    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'login']);
});


Route::middleware([AuthCheck::class])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::get('inventory', [InventoryController::class, 'index']);
    Route::post('inventory', [InventoryController::class, 'addInventory']);
    Route::get('inventory/delete/{id}', [InventoryController::class, 'deleteInventory']);
    Route::get('edit-inventory/{id}', [InventoryController::class, 'editInventory']);
    Route::put('edit-inventory/{id}', [InventoryController::class, 'UpdateInventory']);
    Route::get('inventory/search', [InventoryController::class, 'search']);

    Route::get('order', [OrderController::class, 'index']);
 

    Route::get('report', [ReportController::class, 'index']);

    Route::get('supplier', [SupplierController::class, 'index']);


    Route::get('profile/{username}',[ProfileController::class,'index']);
    Route::get('logout',[LoginController::class,'logout']);
});


Route::middleware([AdminCheck::class])->group(function () {
    Route::post('user',[UserController::class,'addUser']);
    Route::get('user',[UserController::class,'getUser']);
    Route::delete('user', [UserController::class, 'deleteUser']);
    Route::get('edit-user/{id}', [UserController::class, 'editUser']);
    Route::put('edit-user/{id}', [UserController::class, 'UpdateUser']);
});
