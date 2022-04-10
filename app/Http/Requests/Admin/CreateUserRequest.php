<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'firstname' => 'required|string|max:115',
            'lastname' => 'required|string|max:115',
            'email' => 'required|unique:users|email|max:255',
            'phone_number' => 'required|digits:10',
            'department_id' => 'required',
            'alt_phone' => 'required|digits:10',
            'role' => 'required'
        ];
    }
}
