<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StudentAllocated;
use App\Mail\SupervisorAllocated;

use App\Models\Student;
use App\Models\Supervisor;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SupervisorAttachmentController extends Controller
{

    public function sync($year = null)
    {
        $students = Student::has('supervisor')->whereHas('attachment_application', function (Builder $q) use ($year) {
            $year = $year == null ?   now()->year : $year;
            $q->whereYear('created_at', $year);
        })->get();
        return view('attachment.student_supervisor', compact('students'));
    }
    public function allocate()
    {
        $students_with_no_supervisor = Student::doesntHave('supervisor')->get();
        $supervisors = Supervisor::has('user')->with('user')->get();
        $towns = [];
        foreach ($students_with_no_supervisor as $student_with_no_supervisor) {
            $application = $student_with_no_supervisor->attachment_application;
            $town = $application->town;
            if (!in_array($town, $towns)) {
                $towns[] = $town;
            }
        }
        // dd($supervisors);
        return view('admin.supervisors.allocate', compact('towns', 'supervisors'));
    }
    public function allocateSupervisors(Request $request)
    {
        $request->validate([
            'towns' => 'required|array|min:1'
        ]);

        foreach ($request->towns as $town) {
            $town_name = $town['name'];
            $supervisors = $town['supervisors'];
            $students_with_no_supervisor = Student::has('attachment_application')->doesntHave('supervisor')->get();
            foreach ($students_with_no_supervisor as $student) {
                if ($student->attachment_application->town == $town_name) {
                    $supervisor_id = collect($supervisors)->random();
                    $randomSupervisor = Supervisor::find($supervisor_id);
                    $student->supervisor_id = $supervisor_id;
                    $student->save();
                    try {
                        Mail::to($student->user->email)->send(new SupervisorAllocated($randomSupervisor, $student));
                        Mail::to($randomSupervisor->user->email)->send(new StudentAllocated($randomSupervisor, $student));
                    } catch (\Throwable $th) {
                        Log::info($th);
                    }
                }
            }
        }

        return response()->json(null, 201);
    }
}
