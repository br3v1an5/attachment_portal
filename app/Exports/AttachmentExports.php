<?php

namespace App\Exports;

use App\Models\AttachmentApplication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttachmentExports implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AttachmentApplication::all();
    }

    /**
     * @var AttachmentApplication $attachment_application
     */
    public function map($attachment_application): array
    {
        return [

            $attachment_application->student->user->name,
            $attachment_application->attached_dep,
            $attachment_application->org_email,
            $attachment_application->org_no,
            $attachment_application->insurance,
            $attachment_application->org_name,
            $attachment_application->start_date,
            $attachment_application->completion_date,
            $attachment_application->latitude,
            $attachment_application->longitude,
            $attachment_application->remark,
            $attachment_application->town,
            $attachment_application->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'student_name',
            'Attached Department',
            'Organization Email',
            'Organization Number',
            'Insured',
            'Organization Name',
            'Start Date',
            'Completion Date',
            'Latitude',
            'Longitude',
            'Remark',
            'Town',
            'Received At',

        ];
    }
}
