<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return Staff::all();
    }
}
