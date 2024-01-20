<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $employees = Employee::query()->orderBy('role')->paginate(10);

    return view('production.employee.index', compact('employees'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('production.employee.create');
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
      "email" => "required|email|unique:users",
      "address" => "required",
      "role" => "required",
    ]);

    try {
      Employee::create($request->all());
      Alert::toast("Pegawai berhasil ditambahkan", "success");
      return redirect()->route("production.employee.index");
    } catch (\Throwable $th) {
      Alert::error("Pegawai gagal ditambahkan", "error");
      return redirect()->back();
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Employee  $employee
   * @return \Illuminate\Http\Response
   */
  public function show(Employee $employee)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Employee  $employee
   * @return \Illuminate\Http\Response
   */
  public function edit(Employee $employee)
  {
    return view('production.employee.edit', compact('employee'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Employee  $employee
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Employee $employee)
  {
    $request->validate([
      "name" => "required",
      "email" => "required|email|unique:users,email," . $employee->id,
      "address" => "required",
      "role" => "required",
    ]);

    try {
      $employee->update($request->all());
      Alert::toast("Pegawai berhasil diubah", "success");
      return redirect()->route("production.employee.index");
    } catch (\Throwable $th) {
      Alert::error("Pegawai gagal diubah", "error");
      return redirect()->back();
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Employee  $employee
   * @return \Illuminate\Http\Response
   */
  public function destroy(Employee $employee)
  {
    $employee->delete();
    Alert::toast("Pegawai berhasil dihapus", "success");
    return back();
  }
}
