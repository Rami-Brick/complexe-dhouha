<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'student_id',
        'staff_id',
    ];


    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
