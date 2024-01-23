<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Sales::create([
      'customer_id' => 1,
      'product_id' => 1,
      'date' => '2021-01-01',
      'quantity' => 1,
      'total_price' => 10000,
    ]);
  }
}
