<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();
        return view('students.index', compact('students')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);

        $fn = time() .'.'. $request->photo->extension();
        $request->photo->move(public_path('uploads'), $fn);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->photo = $fn;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //Para mostrar la vista de UN estudiante\
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
        ]);

        
        $student = Student::find($student->id);
        $student->name = $request->name;
        $student->email = $request->email;


        if($request->photo){
            $request->validate([
                'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
            ]);
            unlink(public_path('uploads/'.$student->photo));
            $fn = time() .'.'. $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fn);
            $student->photo = $fn;
        }


        $student->update();

        return redirect()->route('students.index')->with('success', 'Student update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        unlink(public_path('uploads/'.$student->photo));
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
