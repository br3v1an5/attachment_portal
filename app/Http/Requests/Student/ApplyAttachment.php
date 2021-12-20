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
            "department" => "required",
            "dob" => 'required',
            "sel_class" => "required",
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
        ];
    }
}
