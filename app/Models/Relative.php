<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_name',
        'mother_name',
        'phone_father',
        'phone_mother',
        'email',
        'address',
        'job_father',
        'job_mother',
        'cin_father',
        'cin_mother',
        'notes',
    ];

    public function student()
    {
        return $this->hasMany(Student::class,'student_id');
    }
}
