<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use ReflectionClass;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    const ADMIN = "Administrator";
    const GUEST = "Guest";
    const ADMIN_ULT = "Admin_ULT";
    const ADMIN_LAYANAN = "Admin_Layanan";

    public static function getDefaultRoles()
    {
        return [
            self::ADMIN,
            self::GUEST,
            self::ADMIN_ULT,
            self::ADMIN_LAYANAN,
        ];
    }


    #################################################################
    #####                      Relations                        #####
    #################################################################

    public function information()
    {
        return $this->belongsToMany(Information::class);
    }

    #################################################################
    #####                    Model Scopes                       #####
    #################################################################

    public function scopeSearch($query, $search)
    {
        return $query->orWhere("name", "like", "%{$search}%");
    }
}
