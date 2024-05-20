<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResultSurveyPpid extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_ppid_id',
        'user_id',
        'hasil'
    ];

    #################################################################
    #####                      Relations                        #####
    #################################################################
    public function survey_ppid(): BelongsTo
    {
        return $this->belongsTo(SurveyPpid::class, 'survey_ppid_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
