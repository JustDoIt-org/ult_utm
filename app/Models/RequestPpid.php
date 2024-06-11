<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestPpid extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];


    public function status(): BelongsTo
    {
        return $this->belongsTo(StatusPpid::class, 'status_ppid', 'id');
    }


    public function scopeSearch($query, $search)
    {
        return $query->orWhere("alamat", "like", "{$search}%")
            ->orWhere("pekerjaan", "like", "%{$search}%");
    }
}
