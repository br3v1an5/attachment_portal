<?php

namespace App\Reports;

use App\Models\AttachmentApplication;
use PDF;


class AttachmentsReport
{
    public function displayReport()
    {
        $applications = AttachmentApplication::all();
        $pdf = PDF::loadView('pdfs.attachments', compact('applications'))->setPaper('a4', 'landscape');
        $name = 'Atttachment Report';
        return $pdf->download($name . '.pdf');
    }
}
