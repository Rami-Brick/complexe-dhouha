<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Relative;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RelativeController extends Controller
{
    public function index()
    {
        $relatives = Relative::all();
        return view('relative.index',compact('relatives'));
    }

    public function create()
    {
        return view('relative.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'phone_father' => 'nullable|string|max:20',
            'phone_mother' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'job_father' => 'nullable|string|max:255',
            'job_mother' => 'nullable|string|max:255',
            'cin_father' => 'nullable|string|max:255',
            'cin_mother' => 'nullable|string|max:255',
            'notes' => 'nullable|string',

        ]);

        $relative = new Relative();
        $relative->father_name = $request->input('father_name');
        $relative->mother_name = $request->input('mother_name');
        $relative->phone_father = $request->input('phone_father');
        $relative->phone_mother = $request->input('phone_mother');
        $relative->email = $request->input('email');
        $relative->address = $request->input('address');
        $relative->job_father = $request->input('job_father');
        $relative->job_mother = $request->input('job_mother');
        $relative->cin_father = $request->input('cin_father');
        $relative->cin_mother = $request->input('cin_mother');
        $relative->notes = $request->input('notes');
        $relative->save();

//        dd('student created successfully');
        return redirect ('/relative');
    }

    public function edit($id)
    {
        $relative = Relative::find($id);
        if (!$relative) {
            return redirect()->route('relatives.index')->with('error', 'Parent not found');
        }

        return view('relative.edit', [
            'relative'=>$relative,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'father_name' => 'required|string|max:255',
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


        $relative = Relative::findOrfail($id);

//        $relative = new Relative($id);
        $relative->father_name = $request->input('father_name');
        $relative->mother_name = $request->input('mother_name');
        $relative->phone_father = $request->input('phone_father');
        $relative->phone_mother = $request->input('phone_mother');
        $relative->email = $request->input('email');
        $relative->address = $request->input('address');
        $relative->job_father = $request->input('job_father');
        $relative->job_mother = $request->input('job_mother');
        $relative->cin_father = $request->input('cin_father');
        $relative->cin_mother = $request->input('cin_mother');
        $relative->notes = $request->input('notes');
        $relative->save();

        return redirect()->route('relatives.index')->with('success', 'Parent updated successfully');
    }

    public function show($id)
    {
        $relative = Relative::findOrFail($id);
        return view('relative.show', ['relative' => $relative]);
    }


    public function destroy($id)
    {

        $relative = Relative::find($id);


        if (!$relative) {
            return response()->json(['message' => 'Parent not found'], 404);
        }


        $relative->delete();

//        dd('Parent deleted successfully');
        return redirect()->route('relatives.index')->with('success', 'Parent deleted successfully');
    }
}
