<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminLayananModel extends Model
{
    use HasFactory;

    protected $table = 'admin_layanan_terpadu';
    protected $guarded = ['id'];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function jenisLayanan(): BelongsTo
    {
        return $this->belongsTo(JenisLayananModel::class, 'jenis_layanan_id', 'id');
    }
}
