<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'name'=>'required',
            // 'name'=>'required|max:5',
            'email'=>'max:5|required'
        ];
    }
    
    public function messages()
    {
        return [
        //    'required'=>'ПОЛЕ :attribute обязательно к заполнению'
           'name.required'=>'ПОЛЕ :attribute обязательно к заполнению',
        //    'name.max'=>'maxxxxsimum'
        ];
    }
}
