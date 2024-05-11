<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselUlt extends Model
{
    use HasFactory;

    protected $fillable = [
        'linkImage',
        'linkButton',
        'nameButton',
    ];
}
