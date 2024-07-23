<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use App\Models\Student;
use Illuminate\Http\Request;

class RelativeController extends Controller
{
    public function index()
    {
        return Relative::all();
    }
}
