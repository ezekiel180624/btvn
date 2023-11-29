<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumb',
        'link',
        'artist',
        'category',
        'duration',
    ];

    public static function searchByTitle($query)
    {
        return self::where('title', 'LIKE', '%' . $query . '%')->get();
    }
}
