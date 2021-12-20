<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StudentAllocated;
use App\Mail\SupervisorAllocated;
use App\Models\AttachmentApplication;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            Mail::to($student->user->email)->send(new SupervisorAllocated($randomSupervisor, $student));
            Mail::to($randomSupervisor->user->email)->send(new StudentAllocated($randomSupervisor, $student));
        }

        $students = Student::all();
        return view('attachment.student_supervisor', compact('students'));
    }
}
