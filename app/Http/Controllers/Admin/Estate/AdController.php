<?php

namespace App\Http\Controllers\Admin\Estate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Estate\CreateAdRequest;
use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\AdPhoto;
use App\Models\AdSpecification;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::query()->orderBy('ad_status')->get();
        return view('admin.pages.Estates.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function status($id)
    {
        $ad = Ad::query()->findOrFail($id);
        if ($ad->ad_status == 0)
        {
            $ad->ad_status = 1;
            $ad->save();
            session()->flash('success', 'تم تفعيل الاعلان بنجاح');
            return back();
        }
        $ad->ad_status = 0;
        $ad->save();
        session()->flash('success', 'تم الغاء تفعيل الاعلان بنجاح');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::query()->findOrFail($id);
        return view('admin.pages.Estates.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::query()->findOrFail($id);
        $categories = AdCategory::query()->get();
        $countries = Country::query()->get();
        return view('admin.pages.Estates.ads.edit', compact('ad', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAdRequest $request, $id)
    {
        $ad = Ad::query()->findOrFail($id);
        $ad->title = $request->title;
        $ad->advertiser_name = $request->advertiser_name;
        $ad->description = $request->description;
        $ad->price = $request->price;
        $ad->space = $request->space;
        $ad->address = $request->address;
        $ad->phone = $request->phone;
        $ad->second_phone = $request->second_phone;
        $ad->sale_or_rent = $request->sale_or_rent;
        $ad->advertiser_email = $request->advertiser_email;
        $ad->category_id = $request->category_id;
        $ad->ad_agent_id = $request->ad_agent_id;
        $ad->city_id = $request->city_id;
        $ad->slug = Str::slug($request->title);

        if ($request->has('images')) {
            foreach ($ad->photos as $photo) {
                Storage::delete('/public/' . $photo->image_avatar);
                Storage::delete('/public/' . $photo->image_medium);
                Storage::delete('/public/' . $photo->image);
            }
            $ad->photos()->delete();
            foreach ($request->images as $image) {
                $time = time();
                $fileName = $image->getClientOriginalName();

                $image_original = \Intervention\Image\Facades\Image::make($image->getRealPath());
                $image_original->resize(500, 500);
                $image_original->save(public_path('storage/Images/Ad-Images/' . $time . $fileName));

                $image_medium = Image::make($image->getRealPath());
                $image_medium->resize(350, 350);
                $image_medium->save(public_path('storage/Images/Ad-Images/' . $time . 'medium' . $fileName));

                $image_avatar = Image::make($image->getRealPath());
                $image_avatar->resize('100', '100');
                $image_avatar->save(public_path('storage/Images/Ad-Images/' . $time . 'avatar' . $fileName));

                AdPhoto::create([
                    'image' => 'Images/Ad-Images/' . $time . $fileName,
                    'image_medium' => 'Images/Ad-Images/' . $time . 'medium' . $fileName,
                    'image_avatar' => 'Images/Ad-Images/' . $time . 'avatar' . $fileName,
                    'ad_id' => $ad->id
                ]);
            }
        }
        if (!empty($ad->specifications[0]))
        {
            if (!$request->has('key'))
            {
                $ad->specifications()->delete();
            }
        }
        if ($request->has('key')) {
            $ad->specifications()->delete();
            foreach ($request->key as $key => $item) {
                AdSpecification::query()->create([
                    'key' => $request->key[$key] ? $request->key[$key] : ' ',
                    'value' => $request->value[$key] ? $request->value[$key] : ' ',
                    'ad_id' => $ad->id
                ]);
            }
        }
        $ad->save();
        session()->flash('success', 'تم تعديل الاعلان بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('da');
        $ad = Ad::query()->findOrFail($id);
        foreach ($ad->photos as $photo) {
            Storage::delete('/public/' . $photo->image_avatar);
            Storage::delete('/public/' . $photo->image_medium);
            Storage::delete('/public/' . $photo->image);
        }
        $ad->delete();
        session()->flash('success', 'تم حذف الاعلان بنجاح');
        return back();
    }
}
