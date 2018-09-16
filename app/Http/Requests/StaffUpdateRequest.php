<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'sex' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'role' => 'required|integer'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Please enter a valid email!',
            'name.required' => 'Please enter staffs fullname!',
            'sex.required' => 'Please select staffs gender!',
            'phone.required' => 'Please enter staffs phone number',
            'role.required' => 'Please select a role for this staff',
        ];
    }
}
