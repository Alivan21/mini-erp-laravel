<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  use HasFactory;

  protected $guarded = [
    'id',
  ];

  public function material()
  {
    return $this->belongsTo(Material::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
