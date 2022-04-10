<?php

namespace App\Reports;

use App\Models\AttachmentApplication;
use App\Models\Student;
use PDF;


class AttachmentsSupervisorReport
{
    public $year;
    public function __construct($year = null)
    {
        $this->year = $year;
    }
    public function displayReport()
    {
        $students = Student::has('supervisor', function ($query) {
            $year = $this->year == null ?   now()->year : $this->year;
            $query->whereYear('created_at', $year);
        })->get();
        $pdf = PDF::loadView('pdfs.supervisor_student', compact('students'))->setPaper('a4', 'landscape');
        $name = 'Student-Supervisor Atttachment Report';
        return $pdf->download($name . '.pdf');
    }
}
