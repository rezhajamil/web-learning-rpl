<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'lesson_id',
        'example_id',
        'quiz_id',
        'other_id',
        'created_at',
        'updated_at',
    ];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson', 'lesson_id');
    }

    public function example()
    {
        return $this->belongsTo('App\Models\Example', 'example_id');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'quiz_id');
    }

    public function other()
    {
        return $this->belongsTo('App\Models\Other', 'other_id');
    }
}
