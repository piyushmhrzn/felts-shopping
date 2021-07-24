<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    public function aboutUsGalleries(){
        return $this->hasMany('App\Models\AboutUsGallery');
    }

    protected $fillable = [
        'title','short_description','long_description'
    ];

}
