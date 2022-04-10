<?php

namespace App\Reports;

use App\Models\AttachmentApplication;
use App\Models\Student;
use PDF;


class AttachmentsSupervisorReport
{
    public function displayReport()
    {
        $students = Student::has('supervisor')->get();
        $pdf = PDF::loadView('pdfs.supervisor_student', compact('students'))->setPaper('a4', 'landscape');
        $name = 'Student-Supervisor Atttachment Report';
        return $pdf->download($name . '.pdf');
    }
}
