<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'due_date',
        'products',
        'amount',
        'paid_amount',
        'status',
        'student_id',
        'reference',
    ];

    protected $casts = [
        'products' => 'array',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
