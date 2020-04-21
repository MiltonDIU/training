<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PermissionsFormRequest extends FormRequest
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
       // dd($this->route());
        $id = $this->route('permission');

        $rules = [
            'permission_category_id' => 'required',
            'namespace' => 'required|string|min:10|max:191',
            'controller' => 'required|string|min:1|max:191',
            'method' => 'required',
            'display' => 'required|string|min:1|max:50',
    
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
        $data = $this->only(['permission_category_id','namespace','controller','method','display','action','allowed','detail']);
        $data['allowed'] = $this->has('allowed');
        return $data;
    }

}