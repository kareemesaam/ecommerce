<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'          => 'required|min:4|max:40',
            'desc'          => 'required|min:4',
            'price'         =>'required',
            'size'          =>'required',
            'category'      =>'required|integer',
            'photo.*'         =>'image|mimes:jpeg,jpg,png,jpng|max:23222'
        ];
    }
}
