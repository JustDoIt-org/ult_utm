<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKouta extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_kunjungan',
        'faculty_id',
        'sisa_kouta',
        // 'tujuan_kunjungan',
        'warna_tulisan',
        'warna_latar_belakang'
    ];

    public static function selectedInformasiKouta($id, $tanggal, $sisa_kouta)
    {
        return InformasiKouta::where('faculty_id', '=', $id)
            ->where('tanggal_kunjungan', '=', $tanggal)
            ->where('sisa_kouta', '=', $sisa_kouta)
            ->get()->first();
    }

    public function scopeSearch($query, $search)
    {
        return $query->orWhere("sisa_kouta", "like", "{$search}%");
        // ->orWhere("tujuan_kunjungan", "like", "%{$search}%");
    }

    #################################################################
    #####                      Relations                        #####
    #################################################################
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
}
