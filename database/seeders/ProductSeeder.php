<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Product::create([
      'name' => 'Product 1',
      'date' => '2021-01-01',
      'material_id' => 1,
      'quantity' => 10,
      'price' => 1500000,
      'stock' => 30,
      'description' => 'Product 1 description',
    ]);
  }
}
