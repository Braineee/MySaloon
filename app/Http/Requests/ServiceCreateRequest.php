<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateRequest extends FormRequest
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
            'service_type' => 'required|string|unique:services',
            'service_percentage' => 'required|integer'
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
            'services_type.required' => 'Please enter name of service',
            'services_type.unique' => 'This service typr already exists',
            'service_percentage.required' => 'Please enter service percentage',
            'service_percentage.integer' => 'Please enter a number'
        ];
    }
}
