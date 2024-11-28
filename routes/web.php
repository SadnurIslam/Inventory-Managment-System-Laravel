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
use App\Http\Controllers\ExpiredInventoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseController;

Route::middleware(LoginCheck::class)->group(callback: function () {
    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'login']);
});


Route::middleware([AuthCheck::class])->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard.index');

    Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventory/add', [InventoryController::class, 'addInventory'])->name('inventory.add');
    Route::post('inventory/store', [InventoryController::class, 'storeInventory'])->name('inventory.store');
    Route::delete('inventory/delete/{id}', [InventoryController::class, 'deleteInventory'])->name('inventory.delete');
    Route::get('inventory/edit/{id}', [InventoryController::class, 'editInventory'])->name('inventory.edit');
    Route::put('inventory/update', [InventoryController::class, 'updateInventory'])->name('inventory.update');
    Route::get('inventory/show/{id}', [InventoryController::class, 'showInventory'])->name('inventory.show');
    Route::get('expired',[InventoryController::class,'expiredInventory'])->name('inventory.expired');


    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/add', [OrderController::class, 'addOrder'])->name('order.add');
    Route::post('order/store', [OrderController::class, 'storeOrder'])->name('order.store');
    Route::delete('order/delete/{id}', [OrderController::class, 'deleteOrder'])->name('order.delete');
    Route::get('order/edit/{id}', [OrderController::class, 'editOrder'])->name('order.edit');
    Route::put('order/update', [OrderController::class, 'updateOrder'])->name('order.update');

    
    Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('supplier/add', [SupplierController::class, 'addSupplier'])->name('supplier.add');
    Route::post('supplier/store', [SupplierController::class, 'storeSupplier'])->name('supplier.store');
    Route::delete('supplier/delete/{id}', [SupplierController::class, 'deleteSupplier'])->name('supplier.delete');
    Route::get('supplier/edit/{id}', [SupplierController::class, 'editSupplier'])->name('supplier.edit');
    Route::put('supplier/update', [SupplierController::class, 'updateSupplier'])->name('supplier.update');


    Route::get('purchase',[PurchaseController::class,'index'])->name('purchase.index');
    Route::get('purchase/add',[PurchaseController::class,'addPurchase'])->name('purchase.add');
    Route::post('purchase/store',[PurchaseController::class,'storePurchase'])->name('purchase.store');
    Route::delete('purchase/delete/{id}',[PurchaseController::class,'deletePurchase'])->name('purchase.delete');
    Route::get('purchase/edit/{id}',[PurchaseController::class,'editPurchase'])->name('purchase.edit');
    Route::put('purchase/update',[PurchaseController::class,'updatePurchase'])->name('purchase.update');


    Route::get('profile/user/{username}',[ProfileController::class,'index'])->name('profile');
    Route::get('logout',[LoginController::class,'logout']);
    Route::get('profile/edit',[ProfileController::class,'editProfile'])->name('profile.edit');
    Route::put('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');

    Route::get('/invoice/order/{orderId}/pdf', [InvoiceController::class, 'generateOrderInvoice'])->name('invoice.pdf');
    Route::get('/invoice/purchase/{id}/pdf', [InvoiceController::class, 'generatePurchaseInvoice'])->name('invoice.pdf');

});


Route::middleware([AdminCheck::class])->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/add', [UserController::class, 'addUser'])->name('users.add');
    Route::post('users/store', [UserController::class, 'storeUser'])->name('users.store');
    Route::delete('users/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
    Route::get('users/edit/{id}', [UserController::class, 'editUser'])->name('users.edit');
    Route::put('users/update', [UserController::class, 'updateUser'])->name('users.update');
});
