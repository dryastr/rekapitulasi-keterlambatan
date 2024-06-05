<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('data-master.students.show', compact('students'));
    }

    public function create()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('data-master.students.create', compact('rombels', 'rayons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
            'nis' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('data-master.students.edit', compact('student', 'rombels', 'rayons'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'rombel_id' => 'required|exists:rombels,id',
            'rayon_id' => 'required|exists:rayons,id',
            'nis' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
