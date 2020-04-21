<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AllocationFormRequest extends FormRequest
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
        $id = $this->route('allocation');
        $batch_id = $this->input('batch_id');
        $course_id = $this->input('course_id');
        $rules = [
            'venue_id' => 'required',
            //'course_id' => 'required|unique:allocations,course_id,' . $id,

            'course_id' => 'required|unique:allocations,course_id,NULL,id,batch_id,' . $batch_id,
            'batch_id' => 'required|unique:allocations,batch_id,NULL,id,course_id,' . $course_id,

            /*'batch_id' => Rule::unique('allocations')->where(function ($query) {
                return $query->where('course_id', 1);
            }),*/
            'day_id' => 'required|array',
            'teacher_id' => 'required|array',
            'last_date' => 'nullable|string|min:0',
            'course_start_date' => 'required',
            'course_end_date' => 'nullable',
            'total_hour' => 'nullable|numeric|string',
            'total_class' => 'nullable|numeric|string',
            'fees' => 'nullable|numeric|min:-999999.99|max:999999.99',
            'discount_fees' => 'nullable|numeric|min:-999999.99|max:999999.99',
        ];

        return $rules;
    }


// TODO: Change the autogenerated stub
    public function messages()
    {
        return [
            'course_id.unique' => 'already assign this course for this batch',
            'batch_id.unique' => 'already assign this batch for this course',

        ];
    }
}