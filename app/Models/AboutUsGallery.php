<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsGallery extends Model
{
    use HasFactory;

    public function aboutUs(){
        return $this->BelongsTo('App\Models\AboutUs');
    }

    protected $fillable = [
        'title','image','status'
    ];
}
