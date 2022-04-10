<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CourseStudentExport implements FromCollection, WithHeadings, WithMapping
{
    public $course;
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return $this->course->students;
    }

    /**
     * @var Student $student
     */
    public function map($student): array
    {
        return [
            $student->user->name,
            $student->user->email,
            $student->phone_number,
            $student->dob,
            $student->user->username,

        ];
    }

    public function headings(): array
    {
        return [
            'Names',
            'Email',
            'Phone',
            'Date Of Birth',
            'Reg Number'

        ];
    }
}
