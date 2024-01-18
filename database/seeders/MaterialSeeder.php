<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Material::create([
      'name' => 'Cotton',
      'description' => 'Cotton is a soft, fluffy staple fiber that grows in a boll, or protective case, around the seeds of the cotton plants of the genus Gossypium in the mallow family Malvaceae. The fiber is almost pure cellulose. Under natural conditions, the cotton bolls will increase the dispersal of the seeds.',
      'quantity' => 100,
    ]);

    Material::create([
      'name' => 'Polyester',
      'description' => 'Polyester is a category of polymers that contain the ester functional group in every repeat unit of their main chain. As a specific material, it most commonly refers to a type called polyethylene terephthalate (PET).',
      'quantity' => 100,
    ]);

    Material::create([
      'name' => 'Silk',
      'description' => 'Silk is a natural protein fiber, some forms of which can be woven into textiles. The protein fiber of silk is composed mainly of fibroin and is produced by certain insect larvae to form cocoons. The best-known silk is obtained from the cocoons of the larvae of the mulberry silkworm Bombyx mori reared in captivity (sericulture).',
      'quantity' => 100,
    ]);
  }
}
