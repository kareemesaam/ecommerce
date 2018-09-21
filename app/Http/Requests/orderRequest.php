<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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
           
            'address'=>'required|min:3',
            'city'          => 'required|min:3',
            'country'       =>'required|min:3',
            'zip'           =>'required|integer',
            'phone'         =>'required|max:11',
        
        ];
    }
}
