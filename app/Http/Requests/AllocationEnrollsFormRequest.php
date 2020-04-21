<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AllocationEnrollsFormRequest extends FormRequest
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
        $allocation_id = $this->input('allocation_id');
        $rules = [
            'allocation_id' => 'required',
            'name' => 'required|string|min:1|max:100',
            'email' => 'required|unique:allocation_enrolls,email,NULL,id,allocation_id,' . $allocation_id,
            'mobile' => 'required|string|min:1|max:15',
    
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'email.unique' => 'We are sorry to accept the same applicant. Thank You',

        ];
    }
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['allocation_id','name','email','mobile','address','education','remark']);
        return $data;
    }

}