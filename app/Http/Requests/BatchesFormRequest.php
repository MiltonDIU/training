<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class BatchesFormRequest extends FormRequest
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
        $id = $this->route('batch');
        $rules = [
            'name' => 'required|string|min:1|max:100|unique:program_types,name,' . $id,
            'is_active' => 'boolean|nullable',
    
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
        $data = $this->only(['name','is_active']);
        $data['is_active'] = $this->has('is_active');
        return $data;
    }

}