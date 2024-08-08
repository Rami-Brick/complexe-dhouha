<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string staff_name
 * @property string staff_phone
 * @property string staff_email
 * @property string created_at
 * @property string updated_at
 *
 * @property Course course
 * @property Comment comment
 */

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [

    ];


    public function course()
    {
        return $this->belongsToMany(Course::class,'course_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }
}
