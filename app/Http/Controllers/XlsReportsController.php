<?php

namespace App\Http\Controllers;

use App\Exports\AttachmentExports;
use App\Exports\SupervisorStudentExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class XlsReportsController extends Controller
{
    public function attachments()
    {
        return Excel::download(new  AttachmentExports, 'attachments.xlsx');
    }
    public function student_supervisor()
    {
        return Excel::download(new  SupervisorStudentExport, 'supervisor_student.xlsx');
    }
}
