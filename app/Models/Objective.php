<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'target_date',
        'progress',
        'course_id',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
