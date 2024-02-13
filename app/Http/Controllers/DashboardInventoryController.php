<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class DashboardInventoryController extends Controller
{
  public function index(Request $request)
  {
    $threshold = Material::all()->avg('quantity');

    $materials = Material::all();

    // Calculate percentage change and add color information
    foreach ($materials as $material) {
      $material->percentageChange = number_format((($material->quantity - $threshold) / $threshold) * 100, 2);
      $material->color = 'gray'; // Default to gray

      // Check quantity level and adjust color
      if ($material->quantity < $threshold / 2) { // Low quantity threshold
        $material->color = 'red';
      } else if ($material->quantity > $threshold) { // High quantity threshold
        $material->color = 'green';
      }
    }

    return view('inventory.dashboard', compact('materials', 'threshold'));
  }
}
