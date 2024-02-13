<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Material;
use App\Models\Product;

class DashboardController extends Controller
{
  public function index()
  {
    $total_material = Material::count();
    $total_product = Product::count();
    $total_employee = Employee::count();
    $total_customer = Customer::count();

    return view('dashboard', compact('total_material', 'total_product', 'total_employee', 'total_customer'));
  }
}
