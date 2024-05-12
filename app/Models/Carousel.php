<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'linkImage',
        'linkButton',
        'nameButton',
    ];

    // public function scopeSearch($query, $search)
    // {
    //     return $query->orWhere("nameButton", "like", "%{$search}%");
    // }
}
