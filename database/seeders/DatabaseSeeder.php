<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::create(
      [
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
      ],
    );

    $this->call([
      MaterialSeeder::class,
      StockSeeder::class,
      EmployeeSeeder::class,
      ProductSeeder::class,
      CustomerSeeder::class,
    ]);
  }
}
