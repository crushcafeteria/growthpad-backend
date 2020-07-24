<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeSubmitRequest extends FormRequest
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
            'name'          => 'required',
            'telephone'     => 'required',
            'email'         => 'required',
            'country'       => 'required',
            'county'        => 'required',
            'category'      => 'required',
            'recipe_name'   => 'required',
            'food_category' => 'required',
            'ingredients'   => 'required',
            'procedure'     => 'required',
        ];
    }
}
