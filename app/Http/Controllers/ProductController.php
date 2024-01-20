<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $materials = Material::all();
    $products = Product::query()->with('material')->orderby('date', 'desc')->paginate(10);

    return view('production.product.index', compact('materials', 'products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $materials = Material::all();

    return view('production.product.create', compact('materials'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate(
      [
        'name' => 'required|string|max:255',
        'date' => 'required|date',
        'material_id' => 'required|exists:materials,id',
        'quantity' => 'required|integer',
        'price' => 'required|integer',
        'stock' => 'required|integer',
        'description' => 'required|string',
      ]
    );

    try {
      $quantity_out = $request->input('quantity');
      $date = $request->input('date');
      $material_quantity = Material::find($request->input('material_id'))->quantity;
      if ($material_quantity < $quantity_out) throw new \Exception('Stok bahan baku tidak mencukupi');
      $quantity = $material_quantity - $quantity_out;
      Material::find($request->input('material_id'))->update(['quantity' => $quantity]);
      Stock::create([
        'material_id' => $request->input('material_id'),
        'date' => $date,
        'quantity_out' => $quantity_out,
      ]);
      Product::create($request->all());
      Alert::success('Produk berhasil ditambahkan');
      return redirect()->route('production.product.index');
    } catch (\Throwable $th) {
      Alert::error('Error', $th->getMessage());
      return back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    $materials = Material::all();

    return view('production.product.edit', compact('materials', 'product'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $request->validate(
      [
        'name' => 'required|string|max:255',
        'date' => 'required|date',
        'material_id' => 'required|exists:materials,id',
        'quantity' => 'required|integer',
        'price' => 'required|integer',
        'stock' => 'required|integer',
        'description' => 'required|string',
      ]
    );

    try {
      $quantity_out = $request->input('quantity');
      $date = $request->input('date');
      $material_quantity = Material::find($request->input('material_id'))->quantity;
      if ($material_quantity < $quantity_out) {
        throw new \Exception('Stok bahan baku tidak mencukupi');
      } else if ($product->quantity > $quantity_out) {
        $quantity = $material_quantity - ($product->quantity - $quantity_out);
        Material::find($request->input('material_id'))->update(['quantity' => $quantity]);
      } else if ($product->quantity < $quantity_out) {
        $quantity = $material_quantity + ($quantity_out - $product->quantity);
        Material::find($request->input('material_id'))->update(['quantity' => $quantity]);
      }
      Stock::create([
        'material_id' => $request->input('material_id'),
        'date' => $date,
        'quantity_out' => $quantity_out,
      ]);
      $product->update($request->all());
      Alert::success('Produk berhasil diubah');
      return redirect()->route('production.product.index');
    } catch (\Throwable $th) {
      Alert::error('Error', $th->getMessage());
      return back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $quantity_out = $product->quantity;
    $quantity = Material::find($product->material_id)->quantity + $quantity_out;
    Material::find($product->material_id)->update(['quantity' => $quantity]);

    $product->delete();
    Alert::toast('Stok berhasil dihapus', 'success');
    return back();
  }
}
