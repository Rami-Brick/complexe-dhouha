<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_name',
        'phone',
        'email',
    ];


    public function class()
    {
        return $this->belongsToMany(Course::class,'course_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }
}
