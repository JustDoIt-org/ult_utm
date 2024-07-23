<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscussionModel extends Model
{
    use HasFactory;
    protected $table = 'discussion';
    protected $guarded = ['id'];

    public function user($type = 'layanan')
    {
        $activeUsers = DB::table('discussion')->select('user_id')->where('tujuan', $type);
        $array = DB::table('users')->select("*")->whereIn('id', $activeUsers)->get();
        $dataTables = json_decode(json_encode($array), true);
        return $dataTables;
    }
}
