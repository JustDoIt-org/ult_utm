<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function scopeSearch($query, $search)
    {
        return $query->orWhere("name", "like", "%{$search}%")->orWhere("code", "like", "{$search}%");
    }

    #################################################################
    #####                      Relations                        #####
    #################################################################

    // public function admin()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    public function informasiKouta()
    {
        return $this->hasMany(PengajuanKunjungan::class);
    }
}
