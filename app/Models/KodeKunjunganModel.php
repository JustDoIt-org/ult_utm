<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeKunjunganModel extends Model
{
    use HasFactory;
    protected $table = 'kode_kunjungan';
    protected $guarded = ['id'];
}
