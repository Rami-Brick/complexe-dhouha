<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Relative;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    public function create()
    {
        $courses = Course::all();
        $relatives = Relative::all();
        return view('student.create',[
            'courses'=>$courses,
            'relatives'=>$relatives
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'course_id' => 'nullable|exists:courses,id',
            'gender' => ['required', Rule::in(['boy', 'girl'])],
            'relative_id' => 'nullable|exists:relatives,id',
            'payment_status' => 'nullable|string|max:255',
            'even_list_as_string' => 'nullable|string|max:255',
            'leave_with' => 'nullable|string|max:255',
        ]);

        $student = new Student();
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->birth_date = $request->input('birth_date');
        $student->course_id = $request->input('course_id');
        $student->gender = $request->input('gender');
        $student->relative_id = $request->input('relative_id');
        $student->payment_status = $request->input('payment_status');
        $student->event_participation = $request->input('even_list_as_string');
        $student->leave_with = $request->input('leave_with');
        $student->save();

//        dd('student created successfully');
        return redirect ('/students');

    }

    public function edit($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }
        $courses = Course::all();
        $relatives = Relative::all();
        return view('student.edit', [
            'student' => $student,
            'courses'=>$courses,
            'relatives'=>$relatives,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'course_id' => 'nullable|exists:courses,id',
            'gender' => ['required', Rule::in(['boy', 'girl'])],
            'relative_id' => 'nullable|exists:relatives,id',
            'payment_status' => 'nullable|string|max:255',
            'even_list_as_string' => 'nullable|string|max:255',
            'leave_with' => 'nullable|string|max:255',
        ]);


        $student = Student::find($id);


        if (!$student) {
            return redirect()->route('students.index')->with('error', 'Student not found');
        }


        $student->update($request->all());


        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {

        $student = Student::find($id);


        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }


        $student->delete();


        return response()->json(['message' => 'Student deleted successfully'], 200);
    }


}
