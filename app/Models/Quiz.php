<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'file',
        'file_name',
        'file_extension',
        'deadline',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function subject()
    {
        return $this->hasOne('App\Models\Subject', 'quiz_id');
    }

    public function quizAnswers()
    {
        return $this->hasMany('App\Models\QuizAnswer', 'quiz_id');
    }
}
