<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productGalleries(){
        return $this->hasMany('App\Models\ProductGallery');
    }

    protected $fillable = [
        'status','order','title','price','model','short_description',
        'long_description','availbility'
    ];

    protected $casts =[
        'color' => 'array',
        'type' => 'array'
    ];
}
