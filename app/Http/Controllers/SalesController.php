<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SalesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $month = $request->query('month', null); // Get month from query string, default to null

    $products = Product::all();
    $customers = Customer::all();
    $sales = Sales::query()->with('product', 'customer')->orderby('date', 'desc')->when($month, function ($query, $month) {
      $query->whereMonth('date', $month); // Apply month filter only if a month is provided
    })->paginate(10);

    return view('sales.index', compact('products', 'customers', 'sales', 'month'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $customers = Customer::all();
    $products = Product::all();

    return view("sales.create", compact('customers', 'products'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      "customer_id" => "required",
      "product_id" => "required",
      "date" => "required",
      "quantity" => "required",
      "total_price" => "required",
    ]);

    try {
      Sales::create($request->all());
      Alert::toast('Data Penjualan Berhasil Ditambahkan.', 'success');
      return redirect()->route('sales.index')->with('success', 'Sales created successfully.');
    } catch (\Throwable $th) {
      Alert::toast($th->getMessage(), 'error');
      return back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function show(Sales $sales)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function edit(Sales $sales)
  {
    $customers = Customer::all();
    $products = Product::all();

    return view("sales.edit", compact('customers', 'products', 'sales'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sales $sales)
  {
    $request->validate([
      "customer_id" => "required",
      "product_id" => "required",
      "date" => "required",
      "quantity" => "required",
      "total_price" => "required",
    ]);

    try {
      $sales->update($request->all());
      Alert::toast('Data Penjualan Berhasil Diubah.', 'success');
      return redirect()->route('sales.index');
    } catch (\Throwable $th) {
      Alert::toast($th->getMessage(), 'error');
      return back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Sales  $sales
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sales $sales)
  {
    $sales->delete();
    Alert::toast('Data Penjualan Berhasil Dihapus.', 'success');
    return back();
  }
}
