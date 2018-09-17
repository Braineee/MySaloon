<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StyleUpdateRequest extends FormRequest
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:accessories',
            'sex' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|integer'
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
            'name.required' => 'Please enter name of style',
            'price.required' => 'Please enter price for the style',
            'duration.integer' => 'Please enter a number for duration',
            'duration.required' => 'Please enter a duration',
            'sex' => 'Please enter gender for this style'
        ];
    }
}
