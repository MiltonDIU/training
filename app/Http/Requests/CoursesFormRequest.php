<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CoursesFormRequest extends FormRequest
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
        $id = $this->route('course');
        $rules = [
            //'venue_id' => 'required',
            'category_id' => 'required',
            //'teacher_id' => 'required',
            //'day_id' => 'required',
            'name' => 'required|string|min:1|max:191|unique:courses,name,' . $id,
            'slug' => 'required|string|min:1|max:191|unique:courses,slug,' . $id,
            'banner' => 'max:3072|mimes:png,jpg,jpeg',
            'detail' => 'nullable|string|min:0|max:2147483647',
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
        $data = $this->only(['category_id','name','slug','detail','summary']);

        if($this->input('is_active')==null){
            $data['is_active']=0;
        }else{
            $data['is_active']=1;
        }

        return $data;
    }

}