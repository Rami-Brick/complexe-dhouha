<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function relative()
    {
        return $this->belongsTo(Relative::class,'relative_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function event()
    {
        return $this->belongsToMany(Event::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'comment_id');
    }

    public function bill()
    {
        return $this->hasMany(Bill::class,'bill_id');
    }



}
