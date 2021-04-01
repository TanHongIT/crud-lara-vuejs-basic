<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function save_student()
    {
        $student = new Student;
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->save();
        return 'fersgdre';
    }

    public function all_students()
    {
        $students = Student::paginate(5);
        return response()->json($students);
    }

    public function edit_student($id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    public function update_student()
    {
        $student = Student::find(request()->id);
        $student->name = request()->name;
        $student->email = request()->email;
        $student->phone = request()->phone;
        $student->update();
        return 'done update';
    }
}
