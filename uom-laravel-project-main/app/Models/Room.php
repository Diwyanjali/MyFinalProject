<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded =[];

    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
