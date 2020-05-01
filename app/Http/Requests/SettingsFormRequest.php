<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SettingsFormRequest extends FormRequest
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
            'title' => 'required|string|min:1|max:70',
            'meta' => 'nullable|string|min:0|max:170',
            'keyword' => 'nullable',
            'mobile' => 'nullable|string|min:0|max:15',
            'email' => 'nullable|string|min:0|max:50',
            'logo_alt' => 'required|string|min:1|max:25',
            'address' => 'nullable',
            'copy_right' => 'nullable',
    
        ];
if ($this->has('logo')==true){
    $rules['logo']='nullable|max:1024|mimes:png,jpg,jpeg';
}
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
        $data = $this->only(['title','meta','keyword','mobile','email','logo_alt','address','copy_right','benefit']);



        return $data;
    }

}