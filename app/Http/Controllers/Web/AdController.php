<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Estate\CreateAdRequest;
use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\AdCity;
use App\Models\AdPhoto;
use App\Models\Country;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    public function index()
    {
        $categories = AdCategory::query()->get();
        $cytis = AdCity::query()->get();
        $ads = Ad::query()->where('ad_status', 1)->latest()->paginate(6);
        return view('website.ads', compact('categories', 'cytis', 'ads'));
    }

    public function create()
    {
        $categories = AdCategory::query()->get();
        $countries = Country::query()->get();
        return view('website.create-ad', compact('categories', 'countries'));
    }

    public function store(CreateAdRequest $request)
    {
        $ad = Ad::query()->create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'advertiser_name' => $request->advertiser_name,
            'description' => $request->description,
            'price' => $request->price,
            'space' => $request->space,
            'address' => $request->address,
            'phone' => $request->phone,
            'second_phone' => $request->second_phone,
            'sale_or_rent' => $request->sale_or_rent,
            'category_id' => $request->category_id,
            'advertiser_email' => $request->advertiser_email,
            'meridians' => $request->meridians,
            'latitudes' => $request->latitudes,
            'city_id' => $request->city_id,
            'user_id' => \Auth::guard('web')->id()
        ]);
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
        session()->flash('success', 'تم اضافة الاعلان بنجاح سوف يتم مراجعته والنشر');
        return redirect()->route('ads.index');

    }
    public function show($slug)
    {
        dd('asd');
    }

    public function getCities($id)
    {
        $cities = Country::query()->findOrFail($id)->cities;
        return response()->json($cities, 200);
    }

}
