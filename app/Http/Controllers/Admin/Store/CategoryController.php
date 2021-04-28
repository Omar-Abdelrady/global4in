<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\CreateCategoryRequest;
use App\Http\Requests\Admin\Store\EditCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.pages.Store Section.Category.index', compact('categories'));
    }

    public function edit($slug)
    {
        $category_id = DB::table('categories')->where('slug', $slug)->first();
        $category = Category::findOrFail($category_id->id);
        return view('admin.pages.Store Section.Category.edit', compact('category'));
    }

    public function update(EditCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->sub_description = $request->sub_description;
        $category->keywords = $request->keywords;
        $category->slug = Str::slug($request->name, '-');
        $category->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.store.category');
    }

    public function show($slug)
    {
        $category_id = DB::table('categories')->where('slug', $slug)->first();
        $category = Category::findOrFail($category_id->id);
        return view('admin.pages.Store Section.Category.show', compact('category'));
    }

    public function create()
    {
        return view('admin.pages.Store Section.Category.edit');
    }

    public function store(CreateCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create([
            'name' => $request->name,
            'sub_description' => $request->sub_description,
            'keywords' => $request->keywords
        ]);
        session()->flash('success', 'تم إضافة القسم بنجاح');
        return redirect()->route('admin.store.category');
    }
}
