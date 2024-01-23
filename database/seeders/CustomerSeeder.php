<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Customer::create([
      'name' => 'John Aspinall',
      'email' => 'johna@example.com',
      'phone' => '01234567890',
      'address' => '123 Fake Street, Faketown, FK1 2FA',
    ]);
  }
}
