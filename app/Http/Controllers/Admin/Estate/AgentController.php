<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Estate\CreateOrUpdateAgentsRequest;
use App\Models\AdAgent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = AdAgent::query()->paginate(10);
        return view('admin.pages.Estates.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Estates.agents.create-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateAgentsRequest $request)
    {
        AdAgent::query()->create($request->all());
        session()->flash('success', 'تم اضافة الوكيل بنجاح');
        return redirect()->route('admin.estates.agents.index');
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
        $agent = AdAgent::query()->findOrFail($id);

        return view('admin.pages.Estates.agents.create-update', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOrUpdateAgentsRequest $request, $id)
    {
        $agent = AdAgent::query()->findOrFail($id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->save();
        session()->flash('success', 'تم معلومات الوكيل بنجاح');
        return redirect()->route('admin.estates.agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = AdAgent::query()->findOrFail($id);
        $agent->delete();
        session()->flash('success', 'تم حذف الوكيل بنجاح');
        return redirect()->route('admin.estates.agents.index');
    }
}
