<?php

namespace App\Reports;

use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;

class CourseStudentReport
{

    public function displayReport(Course $course)
    {
        $students = $course->students;
        $pdf = Pdf::loadView('pdfs.course_student', compact('students', 'course'))->setPaper('a4', 'landscape');
        $name = 'Course Student Report';
        return $pdf->download($name . '.pdf');
    }
}
