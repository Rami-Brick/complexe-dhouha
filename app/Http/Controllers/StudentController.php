<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Relative;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
//    public function index()
//    {
//        $students = Student::sortable()->paginate(5);
//        return view('student.index',compact('students'));
//    }

    public function index(Request $request)
    {
        $gender = $request->input('gender');
        $course = $request->input('course');
        $search = $request->input('search');

        $courseNames = Course::query()->pluck('name');

        $studentsQuery = Student::sortable()->latest()
            ->when($gender, function ($query) use ($gender) {
                $query->where('gender', $gender);
            })
            ->when($course, function ($query) use ($course) {
                $query->whereHas('course', function ($query) use ($course) {
                    $query->where('name', $course);
                });
            })
            ->when($search, function ($query) use ($search) {
                $terms = explode(' ', $search); // Split the search query into terms
                foreach ($terms as $term) {
                    $query->where(function ($query) use ($term) {
                        $query->where('first_name', 'like', '%' . $term . '%')
                            ->orWhere('last_name', 'like', '%' . $term . '%')
                            ->orWhereHas('course', function ($query) use ($term) {
                                $query->where('name', 'like', '%' . $term . '%');
                            })
                            ->orWhereHas('relative', function ($query) use ($term) {
                                $query->where('father_name', 'like', '%' . $term . '%')
                                    ->orWhere('mother_name', 'like', '%' . $term . '%');
                            });
                    });
                }
            });

        $students = $studentsQuery->paginate(5);

        if ($request->ajax()) {
            return view('student.dynamic-index', compact('students'))->render();
        }

        return view('student.index', compact('students','courseNames'));
    }



    public function autocomplete(Request $request)
    {
        $search = $request->get('query');
        $results = Student::with(['course', 'relative'])
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->orWhereHas('course', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('relative', function ($query) use ($search) {
                $query->where('father_name', 'like', '%' . $search . '%')
                    ->orWhere('mother_name', 'like', '%' . $search . '%');
            })
            ->limit(3)
            ->get();

        return response()->json($results);
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
            'payment_status' => ['required', Rule::in(['Paid','Overdue','Partial'])],
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
        return redirect ('/student');

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
            'payment_status' => ['required', Rule::in(['Paid','Overdue','Partial'])],
            'even_list_as_string' => 'nullable|string|max:255',
            'leave_with' => 'nullable|string|max:255',
        ]);


        $student = Student::findOrFail($id);
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


        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('student.show', ['student' => $student]);
    }


    public function destroy($id)
    {

        $student = Student::find($id);


        if ($student) {
            $student->delete();
        }


        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }


}
