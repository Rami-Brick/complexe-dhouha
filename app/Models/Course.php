<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->hasMany(Student::class,'student_id');
    }

    public function objective()
    {
        return $this->hasMany(Objective::class,'objective_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }


}
