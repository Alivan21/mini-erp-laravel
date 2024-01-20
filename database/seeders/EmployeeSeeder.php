<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Employee::create([
      'name' => 'John Doe',
      'email' => 'john@example.com',
      'address' => '123 Main Street',
      'role' => 'manager',
    ]);
  }
}
