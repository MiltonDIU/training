<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class VenuesFormRequest extends FormRequest
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
            'name' => 'required|string|min:1|max:191',
            'address' => 'nullable|string',
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
        $data = $this->only(['name','address']);

        if($this->input('is_active')==null){
            $data['is_active']=0;
        }else{
            $data['is_active']=1;
        }
        return $data;
    }

}