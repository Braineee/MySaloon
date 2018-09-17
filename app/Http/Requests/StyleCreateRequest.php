<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StyleCreateRequest extends FormRequest
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
            'name' => 'required|string|unique:accessories',
            'sex' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|integer',
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
            'name.required' => 'Please enter name of style',
            'price.required' => 'Please enter price for the style',
            'image.required' => 'Please upload a picture of the style',
            'image.image' => 'Please upload a picture file',
            'duration.integer' => 'Please enter a number for duration',
            'duration.required' => 'Please enter a duration',
            'sex' => 'Please enter gender for this style'
        ];
    }
}
