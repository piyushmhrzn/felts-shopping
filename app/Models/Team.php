<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'image','name','post','status','order','description','facebook','instagram','twitter'
    ];

    public function getImageAttribute($value) 
    {
        return $value ?: 'avatar.jpg';
    }
    
}
