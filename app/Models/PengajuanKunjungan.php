<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKunjungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'informasi_kouta_id',
        // 'tujuan_kegiatan',
        'tanggal_tersedia',
        'institusi_pengunjung',
        'provinsi_asal',
        'kota_asal',
        'nama_kegiatan',
        'kapasitas_peserta',
        'jumlah_bus',
        'nama_pic',
        'kontak_pic',
        'surat_permohonan',
        'progress'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->orWhere("tujuan_kegiatan", "like", "%{$search}%")
            ->orWhere("institusi_pengunjung", "like", "%{$search}%")
            ->orWhere("tanggal_tersedia", "like", "%{$search}%")
            ->orWhere("provinsi_asal", "like", "%{$search}%")
            ->orWhere("kota_asal", "like", "%{$search}%")
            ->orWhere("nama_kegiatan", "like", "%{$search}%");
    }

    #################################################################
    #####                      Relations                        #####
    #################################################################
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function informasiKouta()
    {
        return $this->belongsTo(InformasiKouta::class, 'informasi_kouta_id', 'id');
    }
}
