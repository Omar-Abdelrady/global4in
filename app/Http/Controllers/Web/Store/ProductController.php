<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeedback;
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
        $count_evaluate = 0;
        foreach (ProductFeedback::query()->where('product_id', $product->id)->get() as $feedback) {
            $count_evaluate += $feedback->evaluate;
        }
        $rate = intval($count_evaluate < 1 ? 1 : $count_evaluate / ProductFeedback::query()->where('product_id', $product->id)->count()) ;
        return view('website.product-details', compact('product', 'products', 'rate'));
    }
}
