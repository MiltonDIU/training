<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProgramEnrollsFormRequest extends FormRequest
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
        $program_id = $this->input('program_id');
        $rules = [
            'program_id' => 'nullable',
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|unique:program_enrolls,email,NULL,id,program_id,' . $program_id,
            'mobile' => 'required|string|min:1|max:15',
    
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
        $data = $this->only(['program_id','name','email','mobile']);



        return $data;
    }

}