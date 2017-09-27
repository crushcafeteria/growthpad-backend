<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required',
            'location'          => 'required',
            'county'            => 'required',
//            'picture'           => 'required',
            'contact_name'      => 'required',
            'contact_telephone' => 'required',
//            'email'             => 'required',
//            'goals'             => 'required',
            'products'          => 'required',
//            'positioning'       => 'required',
//            'market_type'       => 'required',
//            'total_employees'   => 'required',
        ];
    }

    function messages()
    {
        return [
            'name.required'              => 'Enter business/group name',
            'location.required'          => 'Enter a location',
            'county.required'            => 'Choose a county',
//            'picture.required'           => 'Upload a picture (400 x 200)',
            'contact_name.required'      => 'Enter a contact person names',
            'contact_telephone.required' => 'Enter contact person telephone (separate with commas, if many)',
//            'email.required'             => 'Enter contact person email',
//            'goals.required'             => 'Enter some goals',
            'products.required'          => 'Enter some products (separate with commas, if many)',
//            'positioning.required'       => 'Enter business positioning',
//            'market_type.requires'       => 'Enter market type',
//            'total_employees.required'   => 'Enter number of employees',
        ];
    }
}
