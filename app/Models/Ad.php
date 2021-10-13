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
        return $this->belongsTo(AdCategory::class, 'category_id');
    }


    public function photos()
    {
        return $this->hasMany(AdPhoto::class);
    }

    public function specifications()
    {
        return $this->hasMany(AdSpecification::class);
    }

    public function agent()
    {
        return $this->belongsTo(AdAgent::class, 'ad_agent_id');
    }

}
