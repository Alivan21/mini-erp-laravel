<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MaterialController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $materials = Material::query() // Start with a Query Builder instance
      ->paginate(10);          // Paginate the query
    return view('inventory.material.index', compact('materials'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view("inventory.material.create");
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
      'name' => 'required',
      'description' => 'required',
    ]);

    try {
      Material::create($request->all());
      Alert::toast('Bahan baku berhasil ditambahkan', 'success');
      return redirect()->route('inventory.material.index');
    } catch (\Exception $e) {
      // Handle any unexpected errors
      Alert::error('Terjadi kesalahan, silakan coba lagi', 'Bahan Baku telah ditambahkan sebelumnya');
      return back()->withInput();  // Preserve input values
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Material  $material
   * @return \Illuminate\Http\Response
   */
  public function show(Material $material)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Material  $material
   * @return \Illuminate\Http\Response
   */
  public function edit(Material $material)
  {
    return view("inventory.material.edit", compact("material"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Material  $material
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Material $material)
  {
    $request->validate(
      [
        'name' => 'required',
        'description' => 'required',
      ]
    );

    $material->update($request->all());
    Alert::toast('Bahan baku berhasil diubah', 'success');
    return redirect()->route('inventory.material.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Material  $material
   * @return \Illuminate\Http\Response
   */
  public function destroy(Material $material)
  {

    $material->delete();
    Alert::toast('Bahan baku berhasil dihapus', 'success');
    return back();
  }
}
