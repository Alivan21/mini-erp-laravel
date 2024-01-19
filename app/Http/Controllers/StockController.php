<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Stock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StockController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $month = $request->query('month', null); // Get month from query string, default to null

    $stocks = Stock::with('material')
      ->when($month, function ($query, $month) {
        $query->whereMonth('date', $month); // Apply month filter only if a month is provided
      })->orderby('date', 'desc')->paginate(10);

    $materials = Material::all();

    return view('inventory.stock.index', compact('stocks', 'materials', 'month'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $materials = Material::all();

    return view('inventory.stock.create', compact('materials'));
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
      "material_id" => "required|exists:materials,id",
      "date" => "required|date",
      "quantity_in" => "required|numeric|min:1",
    ]);

    try {
      $quantity_in = $request->input('quantity_in');
      $quantity = $quantity_in + Material::find($request->input('material_id'))->quantity;
      Material::find($request->input('material_id'))->update(['quantity' => $quantity]);
      Stock::create($request->all());
      Alert::toast('Stok berhasil ditambahkan', 'success');
      return redirect()->route('inventory.stock.index');
    } catch (\Exception $e) {
      // Handle any unexpected errors
      Alert::error('Terjadi kesalahan, silakan coba lagi');
      return back()->withInput();  // Preserve input values
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function show(Stock $stock)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function edit(Stock $stock)
  {
    $materials = Material::all();
    return view('inventory.stock.edit', compact('stock', 'materials'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Stock $stock)
  {
    $request->validate([
      "material_id" => "required|exists:materials,id",
      "date" => "required|date",
      "quantity_in" => "required|numeric|min:1",
    ]);

    try {
      $quantity_in = $request->input('quantity_in');
      $quantity = $quantity_in + Material::find($request->input('material_id'))->quantity - $stock->quantity_in;
      Material::find($request->input('material_id'))->update(['quantity' => $quantity]);
      $stock->update($request->all());
      Alert::toast('Stok berhasil diubah', 'success');
      return redirect()->route('inventory.stock.index');
    } catch (\Exception $e) {
      // Handle any unexpected errors
      Alert::error('Terjadi kesalahan, silakan coba lagi');
      return back()->withInput();  // Preserve input values
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function destroy(Stock $stock)
  {
    $quantity_in = $stock->quantity_in;
    $quantity = Material::find($stock->material_id)->quantity - $quantity_in;
    Material::find($stock->material_id)->update(['quantity' => $quantity]);

    $stock->delete();
    Alert::toast('Stok berhasil dihapus', 'success');
    return back();
  }
}
