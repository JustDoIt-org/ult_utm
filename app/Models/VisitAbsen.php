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

    public static function getIdVisitAbsenWithPengajuanId($pengajuan_id)
    {
        return VisitAbsen::where("pengajuan_kunjungan", "=", $pengajuan_id)->get()->first();
    }
}
