<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoriesFormRequest extends FormRequest
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
        $id = $this->route('category');
        $rules = [
            'name' => 'required|string|min:1|max:150|unique:categories,name,' . $id,
            'slug' => 'required|string|min:1|max:170|unique:categories,slug,' . $id,
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
        $data = $this->only(['name','slug','details']);

        if($this->input('is_active')==null){
            $data['is_active']=0;
        }else{
            $data['is_active']=1;
        }

        return $data;
    }

}