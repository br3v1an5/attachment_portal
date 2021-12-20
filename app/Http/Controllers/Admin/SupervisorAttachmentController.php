<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttachmentApplication;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SupervisorAttachmentController extends Controller
{
    public function sync()
    {
        $students_with_no_supervisor = Student::doesntHave('supervisor')->get();
        $supervisors = Supervisor::all();
        foreach ($students_with_no_supervisor as $student) {
            $randomSupervisor = $supervisors->random();
            $student->supervisor_id = $randomSupervisor->id;
            $student->save();
        }
        $students = Student::all();
        return view('attachment.student_supervisor', compact('students'));
    }
}
