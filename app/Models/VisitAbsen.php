<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitAbsen extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan_kunjungan',
        'code_absen',
        'absen'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanKunjungan::class, 'pengajuan_kunjungan', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->orWhere("code_absen", "like", "{$search}%")
        ->orWhere("absen", "like", "%{$search}%");
    }

    public static function getIdVisitAbsenWithPengajuanId($pengajuan_id)
    {
        return VisitAbsen::where("pengajuan_kunjungan", "=", $pengajuan_id)->get()->first();
    }

    public static function getCodeAbsensi($code){
        return VisitAbsen::where("code_absen", "=", $code)->get()->first();
    }
}
