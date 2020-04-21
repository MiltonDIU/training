<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UsersFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'username' => 'nullable|string|min:0|max:50',
            'identical' => 'required|string|min:1|max:25',
            'email' => 'required|string|min:1|max:50',
            'password' => 'required|string|min:1|max:64',
    
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['name','username','identical','email','password']);
        return $data;
    }

}