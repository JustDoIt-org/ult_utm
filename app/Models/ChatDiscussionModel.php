<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatDiscussionModel extends Model
{
    use HasFactory;
    protected $table = 'chat_discussion';
    protected $guarded = ['id'];
}
