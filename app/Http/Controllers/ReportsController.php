<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Reports\AttachmentsReport;
use App\Reports\AttachmentsSupervisorReport;
use App\Reports\CourseStudentReport;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function attachments()
    {
        $report = new AttachmentsReport;
        return $report->displayReport();
    }
    public function supervisor()
    {
        $report = new AttachmentsSupervisorReport;
        return $report->displayReport();
    }
    public function student_course(Course $course)
    {
        $report = new CourseStudentReport;
        return $report->displayReport($course);
    }
}
