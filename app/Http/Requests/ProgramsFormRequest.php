<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class ProgramsFormRequest extends FormRequest
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
        $id = $this->route('program');
        $rules = [
            'name' => 'required|string|min:1|max:180',
            'slug' => 'required|string|min:1|max:190',
            'venue_id' => 'required',
            'category_id' => 'required',
            'program_type_id' => 'required',
            'teacher_id' => 'required|array',
            'day_id' => 'required|array',
            'begin_time' => 'required|array',
            'close_time' => 'required|array',
            'summary' => 'required',
            'details' => 'nullable',
            'is_paid' => 'boolean|nullable',
            'fees' => 'nullable|numeric|min:-999999.99|max:999999.99',
            'begin_date' => 'required',
            'close_date' => 'nullable',
            'is_active' => 'boolean|nullable',

        ];

        if ($id==null){
            $rules =[
                'banner' => 'required|max:3072|mimes:png,jpg,jpeg',
            ];
        }

/*
        if($this->input('is_paid')=='on'){
            $rules['fees']='nullable|numeric';
        }
*/



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
        $data = $this->only(['name','slug','venue_id','category_id','program_type_id','banner','summary','details','fees','begin_date','close_date']);

        if($this->input('is_paid')==null){
            $data['is_paid']=0;
        }else{
            $data['is_paid']=1;
        }

        if($this->input('is_active')==null){
            $data['is_active']=0;
        }else{
            $data['is_active']=1;
        }

        return $data;
    }

}