<?php

namespace App\Exports;


use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SupervisorStudentExport implements FromCollection, WithHeadings, WithMapping
{
    public $year;
    public function __construct($year = null)
    {
        $this->year = $year;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $year =  $this->year == null ?   now()->year : $this->year;
        return Student::has('supervisor')->whereHas('attachment_application', function (Builder $q) use ($year) {
            $q->whereYear('created_at', $year);
        })->get();
    }

    /**
     * @var Student $student
     */
    public function map($student): array
    {
        return [
            $student->user->name,
            $student->supervisor->user->attached_dep,
            $student->attachment_application->attached_dep,
            $student->attachment_application->org_email,
            $student->attachment_application->org_no,
            $student->attachment_application->insurance,
            $student->attachment_application->org_name,
            $student->attachment_application->start_date,
            $student->attachment_application->completion_date,
            $student->attachment_application->latitude,
            $student->attachment_application->longitude,
            $student->attachment_application->remark,
            $student->attachment_application->town,
            $student->attachment_application->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Student name',
            'Supervisor name',
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
