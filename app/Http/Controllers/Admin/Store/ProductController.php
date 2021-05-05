<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\CreateProductsRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\PivotProductColor;
use App\Models\PivotProductSize;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductPhoto;
use App\Models\ProductSize;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('admin.pages.Store Section.Product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        $categories = Category::all();
        return view('admin.pages.Store Section.Product.create', compact('sizes', 'colors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'sub_description' => $request->sub_description,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'slug' => Str::slug($request->name, '-'),
            'category_id' => $request->category
        ]);
        $product->sizes()->sync($request->sizes);
        $product->colors()->sync($request->colors);
        if ($request->has('specification_key')) {
            foreach ($request->specification_key as $key => $item) {
                ProductSpecification::create([
                    'name' => $request->specification_key[$key],
                    'body' => $request->specification_value[$key],
                    'product_id' => $product->id
                ]);
            }
        }

        foreach ($request->images as $image) {
            $fileName = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 350);
            $time = time();
            $file = $image_resize->save(public_path('storage/Images/Product-Images/' . $time . $fileName));
            ProductPhoto::create([
                'image' => 'Images/Product-Images/' . $time . $fileName,
                'product_id' => $product->id
            ]);
        }
        session()->flash('success', 'تم اضافة المنتج بنجاح');
        return redirect()->route('admin.store.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $id = DB::table('products')->where('slug', $slug)->first();
        $product = Product::FindOrFail(isset($id) ? $id->id : null);
        return view('admin.pages.Store Section.Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $id = DB::table('products')->where('slug', $slug)->first();
        $product = Product::FindOrFail(isset($id) ? $id->id : null);
        $sizes = ProductSize::all();
        $colors = ProductColor::all();
        $categories = Category::all();
        return view('admin.pages.Store Section.Product.edit', compact('product', 'sizes', 'colors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $slug)
    {
        $id = DB::table('products')->where('slug', $slug)->first();
        $product = Product::FindOrFail(isset($id) ? $id->id : null);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->sub_description = $request->sub_description;
        $product->description = $request->description;
        $product->keywords = $request->keywords;
        $product->category_id = $request->category;
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->sizes);
        $product->specifications()->delete();
        if ($request->has('specification_key')) {
            foreach ($request->specification_key as $key => $item) {
                ProductSpecification::create([
                    'name' => $request->specification_key[$key],
                    'body' => $request->specification_value[$key],
                    'product_id' => $product->id
                ]);
            }
        }
        if ($request->has('images'))
        {
            foreach ($product->photos as $photo) {
                Storage::delete('/public/' . $photo->image);
            }
            foreach ($request->images as $image) {
                $fileName = $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(350, 350);
                $time = time();
                $file = $image_resize->save(public_path('storage/Images/Product-Images/' . $time . $fileName));
                ProductPhoto::create([
                    'image' => 'Images/Product-Images/' . $time . $fileName,
                    'product_id' => $product->id
                ]);
            }
        }
        $product->save();
        session()->flash('success', 'تم تعديل المنتج بنجاح');
        return redirect()->route('admin.store.products.show', $product->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $id = DB::table('products')->where('slug', $slug)->first();
        $product = Product::FindOrFail(isset($id) ? $id->id : null);
        foreach ($product->photos as $photo) {
            Storage::delete('/public/' . $photo->image);
        }
        $product->delete();
        return redirect()->back();
    }
}
