<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryControoler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::query()->paginate(10);
        return view('admin.pages.Estates.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Estates.country.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200'
        ],[
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'اقصى حد للحروف 200 حرف',
        ]);

        Country::query()->create($request->all());
        session()->flash('success', 'تم الاضافة بنجاح');
        return redirect()->route('admin.estates.countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::query()->findOrFail($id);
        return view('admin.pages.Estates.country.create-edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:200'
        ],[
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'اقصى حد للحروف 200 حرف',
        ]);
        $country = Country::query()->findOrFail($id);
        $country->name = $request->name;
        $country->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.estates.countries.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::query()->findOrFail($id);
        $country->delete();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect()->route('admin.estates.countries.index');
    }
}
