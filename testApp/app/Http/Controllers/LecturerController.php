<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;
use App\Http\Requests\StoreLectureRequest;

class LecturerController extends Controller
{
    public function index()
    {
        $data['lecturers'] = Lecturer::all();
        // $data['lecturers'] = Lecturer::where('department_id', 1)->get();

        // dd($lecturers);
        // echo "<pre>";
        // print_r($lecturers);
        // echo "</pre>";
        return view('lecturer.index', $data);
    }

    public function create()
    {
        $data['departments'] = Department::pluck('name', 'id');
        return view('lecturer.create', $data);
    }

    public function store(StoreLectureRequest $request)
    {
        // without validation
        // Lecturer::create($request->all());

        // validation
        // $validated = $request->validate([
        //     'nidn' => 'required|digits:10|unique:lecturers,nidn',
        //     'name' => 'required|min:3|max:60|string',
        //     'department_id' => 'required',
        // ]);

        // Lecturer::create($validated);

        // Request validation
        Lecturer::create($request->validated());


        return redirect()->route('lecturer.index');
    }
}
