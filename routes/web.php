<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
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
