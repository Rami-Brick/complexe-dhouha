<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use App\Models\Student;
use Illuminate\Http\Request;

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

        $relative = Relative::create($request->all());

        return response()->json(['message' => 'Relative created successfully', 'relative' => $relative], 201);
    }
}
