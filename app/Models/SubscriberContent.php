<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','image','long_description'
    ];
}
