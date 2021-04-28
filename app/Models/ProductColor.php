<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'pivot_product_colors', 'product_id', 'color_id');
    }
}
