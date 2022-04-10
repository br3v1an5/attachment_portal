<?php

namespace App\Http\Controllers;

use App\Reports\AttachmentsReport;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function attachments()
    {
        $report = new AttachmentsReport;
        return $report->displayReport();
    }
}
