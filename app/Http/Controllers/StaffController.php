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
        $staffs = Staff::all();
        return view('staff.index',compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',

        ]);
        $staff = new Staff();
        $staff->name = $request->input('name');
        $staff->phone = $request->input('phone');
        $staff->email = $request->input('email');
        $staff->save();


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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
        ]);

        $staff = staff::findOrfail($id);

        $staff->name = $request->input('name');
        $staff->phone = $request->input('phone');
        $staff->email = $request->input('email');
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'staff updated successfully');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', ['staff' => $staff]);
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
