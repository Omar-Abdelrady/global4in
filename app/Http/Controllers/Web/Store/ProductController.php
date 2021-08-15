<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = Product::query()->where('slug', $slug)->first();
        switch ($product)
        {
            case null:
                return abort(404);
                break;
        }
        $products = $product->category->products()->latest()->take(4)->get();
        return view('website.product-details', compact('product', 'products'));
    }
}
