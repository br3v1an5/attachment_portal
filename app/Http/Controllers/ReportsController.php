<?php

namespace App\Http\Controllers;

use App\Reports\AttachmentsReport;
use App\Reports\AttachmentsSupervisorReport;
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
}
