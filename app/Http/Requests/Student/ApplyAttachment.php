<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class ApplyAttachment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "phone_number" => 'required',
            "department_id" => "required|numeric|exists:departments,id",
            "dob" => 'required',
            "course_id" => "required|numeric|exists:courses,id",
            "alt_phone" => 'required',
            "attached_dep" => 'required',
            "org_email" => 'required',
            "org_no" => 'required',
            "insurance" => "required",
            "org_name" => 'required',
            "start_date" => 'required',
            "completion_date" => 'required',
            "latitude" => 'nullable',
            "longitude" => 'nullable',
            "remark" => 'required',
            "town" => 'required',
            'service_number' => 'nullable'
        ];
    }
}
