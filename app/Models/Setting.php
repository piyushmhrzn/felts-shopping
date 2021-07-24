<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name','meta_description','favicon','logo',
        'homepage_banner1','main_heading1','sub_heading1',
        'homepage_banner2','main_heading2','sub_heading2','title2','description2',
        'primary_email','secondary_email','primary_phone','secondary_phone',
        'street','city','country','google_map_url',
        'facebook','instagram','twitter','youtube'
    ];

    public function getFaviconAttribute($value) 
    {
        return $value ?: 'favicon.png';
    }

    public function getLogoAttribute($value) 
    {
        return $value ?: 'logo.jpg';
    }

    public function getHomepageBanner1Attribute($value) 
    {
        return $value ?: 'homepage_banner1.jpg';
    }

    public function getHomepageBanner2Attribute($value) 
    {
        return $value ?: 'homepage_banner2.jpg';
    }
}
