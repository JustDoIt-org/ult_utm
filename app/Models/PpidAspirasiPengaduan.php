<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PpidAspirasiPengaduan extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = ['user_id', 'jenis', 'nik', 'judul', 'uraian', 'saran', 'file', 'progress'];


    #################################################################
    #####                      Relations                        #####
    #################################################################
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
