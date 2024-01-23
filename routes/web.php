<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get("inventory", [MaterialController::class, 'index'])->name("inventory.material.index");
  Route::get("inventory/material/create", [MaterialController::class, 'create'])->name("inventory.material.create");
  Route::post("inventory/material", [MaterialController::class, 'store'])->name("inventory.material.store");
  Route::get("inventory/material/{material}/edit", [MaterialController::class, 'edit'])->name("inventory.material.edit");
  Route::patch("inventory/material/{material}", [MaterialController::class, 'update'])->name("inventory.material.update");
  Route::delete("inventory/material/{material}", [MaterialController::class, 'destroy'])->name("inventory.material.destroy");

  Route::get("inventory/stock", [StockController::class, 'index'])->name("inventory.stock.index");
  Route::get("inventory/stock/create", [StockController::class, 'create'])->name("inventory.stock.create");
  Route::post("inventory/stock", [StockController::class, 'store'])->name("inventory.stock.store");
  Route::get("inventory/stock/{stock}/edit", [StockController::class, 'edit'])->name("inventory.stock.edit");
  Route::patch("inventory/stock/{stock}", [StockController::class, 'update'])->name("inventory.stock.update");
  Route::delete("inventory/stock/{stock}", [StockController::class, 'destroy'])->name("inventory.stock.destroy");

  Route::get("production/employee", [EmployeeController::class, 'index'])->name("production.employee.index");
  Route::get("production/employee/create", [EmployeeController::class, 'create'])->name("production.employee.create");
  Route::post("production/employee", [EmployeeController::class, 'store'])->name("production.employee.store");
  Route::get("production/employee/{employee}/edit", [EmployeeController::class, 'edit'])->name("production.employee.edit");
  Route::patch("production/employee/{employee}", [EmployeeController::class, 'update'])->name("production.employee.update");
  Route::delete("production/employee/{employee}", [EmployeeController::class, 'destroy'])->name("production.employee.destroy");

  Route::get("production/product", [ProductController::class, 'index'])->name("production.product.index");
  Route::get("production/product/create", [ProductController::class, 'create'])->name("production.product.create");
  Route::post("production/product", [ProductController::class, 'store'])->name("production.product.store");
  Route::get("production/product/{product}/edit", [ProductController::class, 'edit'])->name("production.product.edit");
  Route::patch("production/product/{product}", [ProductController::class, 'update'])->name("production.product.update");
  Route::delete("production/product/{product}", [ProductController::class, 'destroy'])->name("production.product.destroy");

  Route::get("sales", [SalesController::class, 'index'])->name("sales.index");
  Route::get("sales/create", [SalesController::class, 'create'])->name("sales.create");
  Route::post("sales", [SalesController::class, 'store'])->name("sales.store");
  Route::get("sales/{sales}/edit", [SalesController::class, 'edit'])->name("sales.edit");
  Route::patch("sales/{sales}", [SalesController::class, 'update'])->name("sales.update");
  Route::delete("sales/{sales}", [SalesController::class, 'destroy'])->name("sales.destroy");

  Route::get("sales/customer", [CustomerController::class, 'index'])->name("sales.customer.index");
  Route::get("sales/customer/create", [CustomerController::class, 'create'])->name("sales.customer.create");
  Route::post("sales/customer", [CustomerController::class, 'store'])->name("sales.customer.store");
  Route::get("sales/customer/{customer}/edit", [CustomerController::class, 'edit'])->name("sales.customer.edit");
  Route::patch("sales/customer/{customer}", [CustomerController::class, 'update'])->name("sales.customer.update");
  Route::delete("sales/customer/{customer}", [CustomerController::class, 'destroy'])->name("sales.customer.destroy");

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
