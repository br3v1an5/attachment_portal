<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createSupervisorRequest extends FormRequest
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string',
            'department' => 'required|string',
            'dob' => 'date:before:today-18years',
            'class_name' => 'required',
            'alt_phone' => 'required|string',
        ];
    }
}
