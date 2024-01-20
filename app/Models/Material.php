<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  use HasFactory;

  protected $guarded = [
    'id',
  ];

  public function stock()
  {
    return $this->hasMany(Stock::class);
  }

  public function product()
  {
    return $this->hasMany(Product::class);
  }
}
