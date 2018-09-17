<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessoryCreateRequest extends FormRequest
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
            'price' => 'required|string',
            'quantity' => 'required|integer',
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
            'name.required' => 'Please enter name of accessory',
            'price.required' => 'Please enter price for the accessory',
            'picture.required' => 'Please upload a picture of the accessory',
            'picture.image' => 'Please upload a picture file',
            'quantity.integer' => 'Please enter a number for quantites',
            'quantity.required' => 'Please enter quantity available for the accessory'
        ];
    }
}
