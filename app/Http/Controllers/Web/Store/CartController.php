<?php

namespace App\Http\Controllers\Web\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('website.cart1');
    }

    public function add(Request $request, $slug)
    {
        $product = Product::query()->where('slug', $slug)->first();
        $data = $request->validate(
            [
                'color' => 'required',
                'size' => 'required'
            ],
            [
                'color.required' => 'عذرا يجب اختيار لون المنتج',
                'size.required' => 'عذرا يجب اختيار حجم المنتج'
            ]);
        dd($data, $product);
    }

    public function delete($slug)
    {
        $product = Product::query()->where('slug', $slug)->first();

    }
}
