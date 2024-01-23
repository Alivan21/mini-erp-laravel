<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $customers = Customer::query()->paginate(10);

    return view('sales.customer.index', compact('customers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view("sales.customer.create");
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
      "name" => "required",
      "email" => "required|email",
      "phone" => "required",
      "address" => "required",
    ]);
    try {
      Customer::create($request->all());
      Alert::toast("Pelanggan berhasil ditambahkan", "success");
      return redirect()->route("sales.customer.index");
    } catch (\Throwable $th) {
      Alert::error("Pelanggan gagal ditambahkan", "error");
      return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function show(Customer $customer)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function edit(Customer $customer)
  {
    return view("sales.customer.edit", compact("customer"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Customer $customer)
  {
    $request->validate([
      "name" => "required",
      "email" => "required|email",
      "phone" => "required",
      "address" => "required",
    ]);

    try {
      $customer->update($request->all());
      Alert::toast("Pelanggan berhasil diubah", "success");
      return redirect()->route("sales.customer.index");
    } catch (\Throwable $th) {
      Alert::error("Pelanggan gagal diubah", "error");
      return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Customer $customer)
  {
    $customer->delete();
    Alert::toast("Pelanggan berhasil dihapus", "success");
    return back();
  }
}
