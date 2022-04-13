<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'user_id',
        'desc',
        'file',
        'file_name',
        'file_extension',
        'created_at',
        'updated_at',
    ];

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
