<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Relative;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'level' => ['required', Rule::in(['bébé', '1-2 ans', '2-3 ans', '3 ans', '4 ans', '5 ans'])],
            'staff_id' => 'nullable|exists:staff,id',
        ]);
        $course = new Course();
        $course->course_name = $request->input('course_name');
        $course->level = $request->input('level');
//        $course->staff_id = $request->input('staff_id');
        $course->save();

//        dd('student created successfully');
        return redirect ('/course');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        return view('course.edit', [
            'course'=>$course,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'course_name' => 'required|string|max:255',
            'level' => ['required', Rule::in(['bébé', '1-2 ans', '2-3 ans', '3 ans', '4 ans', '5 ans'])],
            'staff_id' => 'nullable|exists:staff,id',
        ]);


        $course = Course::findOrfail($id);

        $course = new Course($id);
        $course->course_name = $request->input('course_name');
        $course->level = $request->input('level');
//        $course->staff_id = $request->input('staff_id');
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {

        $course = Course::find($id);


        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }


        $course->delete();

//        dd('Parent deleted successfully');
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
