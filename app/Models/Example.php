<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'file',
        'file_name',
        'file_extension',
        'created_at',
        'updated_at',
    ];

    public function subject()
    {
        return $this->hasOne('App\Models\Subject', 'example_id');
    }
}
