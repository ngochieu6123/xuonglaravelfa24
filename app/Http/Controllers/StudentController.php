<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    const PATH_VIEW = 'students.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::with('passport')->latest('id')->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:students',
            'classroom_id' => 'required|exists:classrooms,id',
            'passport_number' => 'nullable|string|max:255',
            'issued_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
        ]);

        try {
            $student = Student::create($data);
            if ($request->filled('passport_number')) {
                $student->passport()->create([
                    'passport_number' => $request->passport_number,
                    'issued_date' => $request->issued_date,
                    'expiry_date' => $request->expiry_date,
                ]);
            }

            return redirect()
                ->route('students.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('passport');
        return view(self::PATH_VIEW . __FUNCTION__, compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        $student->load('passport');
        return view(self::PATH_VIEW . __FUNCTION__, compact('student', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:100|unique:students,email,' . $student->id,
            'classroom_id' => 'required|exists:classrooms,id',
            'passport_number' => 'nullable|string|max:255',
            'issued_date' => 'nullable|date',
            'expiry_date' => 'nullable|date',
        ]);

        try {
            $student->update($data);
            if ($request->filled('passport_number')) {
                $student->passport()->updateOrCreate(
                    [],
                    [
                        'passport_number' => $request->passport_number,
                        'issued_date' => $request->issued_date,
                        'expiry_date' => $request->expiry_date,
                    ]
                );
            }
            return redirect()
                ->route('students.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return back()
                ->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    public function forceDestroy(Student $student)
    {
        try {
            $student->forceDelete();
            return back()
                ->with('success', true);
        } catch (\Throwable $th) {
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }
}
