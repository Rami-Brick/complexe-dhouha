<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index',compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone_father' => 'required|string|max:20',
            'phone_mother' => 'required|string|max:20',
            'email' => 'nullable|email',
            'address' => 'required|string|max:255',
            'job_father' => 'required|string|max:255',
            'job_mother' => 'required|string|max:255',
            'cin_father' => 'required|string|max:255',
            'cin_mother' => 'required|string|max:255',
            'notes' => 'required|string',

        ]);

        $relative = Relative::create($request->all());

        return response()->json(['message' => 'Relative created successfully', 'relative' => $relative], 201);
    }
}
