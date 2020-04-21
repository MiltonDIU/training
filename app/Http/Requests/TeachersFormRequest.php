<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TeachersFormRequest extends FormRequest
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
        $id = $this->route('teacher');
        $rules = [
            'name' => 'required|string|min:1|max:191',
            'detail' => 'nullable|string|min:0|max:2147483647',
            'email' => 'nullable|string|min:0|max:191|unique:teachers,email,' . $id,
            'mobile' => 'nullable|string|min:0|max:15|unique:teachers,mobile,' . $id,
            'website' => 'nullable|string|min:0|max:191',
            'is_active' => 'boolean|nullable',
            'avatar' => 'max:512|mimes:png,jpg,jpeg',
    
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
        $data = $this->only(['name','detail','email','mobile','website']);
        if($this->input('is_active')==null){
            $data['is_active']=0;
        }else{
            $data['is_active']=1;
        }
        return $data;
    }

}