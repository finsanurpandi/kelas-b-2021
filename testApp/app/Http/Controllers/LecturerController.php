<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLecturerRequest;

class LecturerController extends Controller
{
    public function index()
    {
        // $data['lecturers'] = Lecturer::all();
        $data['lecturers'] = Lecturer::with('department')->get();
        // $data['lecturers'] = Lecturer::where('department_id', 1)->get();
        // $students = Lecturer::find('7329617821')->students;
        // dd($students);
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

    public function edit(string $nidn)
    {
        $data['lecturer'] = Lecturer::find($nidn);
        $data['departments'] = Department::pluck('name', 'id');
        return view('lecturer.create', $data);
    }

    public function update(UpdateLecturerRequest $request, $nidn)
    {
        $lecturer = Lecturer::find($nidn);
        $lecturer->update($request->validated());

        return redirect()->route('lecturer.index');
    }

    public function destroy(string $nidn)
    {
        Lecturer::find($nidn)->delete();

        return redirect()->route('lecturer.index');
    }

    // soft deleting
    public function recycle_bin()
    {
        $data['lecturers'] = Lecturer::onlyTrashed()->get();
        $data['jumlah'] = Lecturer::onlyTrashed()->count();
        return view('lecturer.recyclebin', $data);
    }

    public function restore(Request $request, $nidn)
    {
        Lecturer::onlyTrashed()->where('nidn', $nidn)->restore();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function delete(Request $request, $nidn)
    {
        Lecturer::onlyTrashed()->where('nidn', $nidn)->forceDelete();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function restore_all()
    {
        Lecturer::onlyTrashed()->restore();

        return redirect()->route('lecturer.recycle.bin');
    }

    public function delete_all()
    {
        Lecturer::onlyTrashed()->forceDelete();

        return redirect()->route('lecturer.recycle.bin');
    }

    // relationship
    public function students(string $nidn)
    {
        $data['students'] = Lecturer::find($nidn)->students;
        $data['lecture'] = Lecturer::find($nidn);
        $data['departments'] = Department::find('1')->student;
        // $data['users'] = User::all();
        $data['users'] = User::find(2);

        return view('lecturer.student', $data);
    }
}
