<?php

namespace App\Reports;

use App\Models\AttachmentApplication;
use PDF;


class AttachmentsReport
{
    public $year;
    public function __construct($year = null)
    {
        $this->year = $year;
    }
    public function displayReport()
    {
        $year =  $this->year == null ?   now()->year : $this->year;
        $applications = AttachmentApplication::whereYear('created_at', $year)->get();
        $pdf = PDF::loadView('pdfs.attachments', compact('applications'))->setPaper('a4', 'landscape');
        $name = 'Atttachment Report';
        return $pdf->download($name . '.pdf');
    }
}
