<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetsCreateRequest extends FormRequest
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
            'name' => 'required|string|unique:assets',
            'location' => 'required|string',
            'status' => 'required|string',
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
            'name.required' => 'Please enter name of asset',
            'name.unique' => 'This asset has been added already, Please add a number to the name if the assets are similar',
            'location.required' => 'Please select asset location',
            'status.required' => 'Please select assets of asset',
            'image.required' => 'Please upload assets picture'
        ];
    }
}
