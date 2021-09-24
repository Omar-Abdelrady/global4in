<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(AdCity::class);
    }

    public function category()
    {
        return $this->belongsTo(AdCategory::class);
    }


    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }

    public function specifications()
    {
        return $this->hasMany(AdSpecification::class);
    }

    public function getAdofCategory($id)
    {
        dd($id);
        return AdCategory::query()->findOrFail($id)->ads;
    }

}
