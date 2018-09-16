<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'role' => 'required|integer',
            'image' => 'required|image'
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
            'role.required' => 'Please seelct a role for this staff',
            'image.required' => 'Please upload staffs picture'
        ];
    }
}
