<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChatDiscussionModel extends Model
{
    use HasFactory;
    protected $table = 'chat_discussion';
    protected $guarded = ['id'];


    public function discussion(): BelongsTo
    {
        return $this->belongsTo(DiscussionModel::class, 'discussion_id', 'id');
    }
}
