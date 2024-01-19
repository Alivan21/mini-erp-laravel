<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
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

  Route::get("production", function () {
    return view("production.dashboard");
  })->name("production.index");

  Route::get("sales", function () {
    return view("sales.dashboard");
  })->name("sales.index");

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
