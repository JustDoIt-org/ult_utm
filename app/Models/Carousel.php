<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'linkButton',
        'nameButton',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->orWhere("nameButton", "like", "%{$search}%");
    }
}
