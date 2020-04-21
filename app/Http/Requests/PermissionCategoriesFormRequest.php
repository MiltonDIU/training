<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PermissionCategoriesFormRequest extends FormRequest
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
        $id = $this->route('permissionCategory');
        $rules = [
            'name' => 'required|string|min:1|max:50|unique:permission_categories,name,'.$id,
            'slug' => 'nullable|string|min:0|max:50|unique:permission_categories,slug,'.$id,

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
        $data = $this->only(['name','slug','detail','is_active']);
        return $data;
    }

}