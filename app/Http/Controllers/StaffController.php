<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index');
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_name' => 'required|string|max:255',
            'staff_phone' => 'required|string|max:20',
            'staff_email' => 'nullable|email',

        ]);
        $staff = new Staff();
        $staff->staff_name = $request->input('staff_name');
        $staff->staff_phone = $request->input('staff_phone');
        $staff->staff_email = $request->input('staff_email');
//        $staff->staff_id = $request->input('staff_id');
        $staff->save();

//        dd('student created successfully');
        return redirect ('/staff');
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        if (!$staff) {
            return redirect()->route('staff.index')->with('error', 'staff not found');
        }

        return view('staff.edit', [
            'staff'=>$staff,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'staff_name' => 'required|string|max:255',
            'staff_phone' => 'required|string|max:20',
            'staff_email' => 'nullable|email',
        ]);


        $staff = staff::findOrfail($id);

        $staff = new Staff($id);
        $staff->staff_name = $request->input('staff_name');
        $staff->staff_phone = $request->input('staff_phone');
        $staff->staff_email = $request->input('staff_email');
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'staff updated successfully');
    }

    public function destroy($id)
    {

        $staff = Staff::find($id);


        if (!$staff) {
            return response()->json(['message' => 'staff not found'], 404);
        }


        $staff->delete();

//        dd('Parent deleted successfully');
        return redirect()->route('staff.index')->with('success', 'staff deleted successfully');
    }
}
