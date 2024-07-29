<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_fee',
        'age_group',
    ];


    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
