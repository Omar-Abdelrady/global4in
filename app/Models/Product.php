<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function colors()
    {
        return $this->belongsToMany(ProductColor::class, 'pivot_product_colors', 'product_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(ProductSize::class, 'pivot_product_sizes', 'product_id', 'size_id');
    }
}
