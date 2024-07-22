<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionModel extends Model
{
    use HasFactory;
    protected $table = 'discussion';
    protected $guarded = ['id'];
}
