<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusPpid extends Model
{
    use HasFactory;


    protected $guarded = ['id'];



    #################################################################
    #####                      Relations                        #####
    #################################################################



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
