<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $guarded = [
    'id',
    'created_at',
    'updated_at',
  ];

  public function material()
  {
    return $this->belongsTo(Material::class);
  }

  public function stock()
  {
    return $this->hasMany(Stock::class);
  }

  public function sales()
  {
    return $this->hasMany(Sales::class);
  }
}
