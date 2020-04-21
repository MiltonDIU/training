<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\AllocationEnrollsFormRequest;
use App\Http\Resources\CourseCollection;
use App\Models\AllocationEnroll;
use App\Models\Course;
use App\Models\EnrollPayment;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Allocation;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CourseCollection(Allocation::with('course')->orderBy('last_date','desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $allocation_id = $request->input('allocation_id');
            $allocation = Allocation::find($allocation_id);
$course=['fees'=>$allocation->fees,'discount_fees'=>$allocation->discount_fees,'name'=>$allocation->course->name];
            $validator = Validator::make($request->all(), [
                'allocation_id' => 'required',
                'name' => 'required|string|min:1|max:100',
                'email' => 'required|unique:allocation_enrolls,email,NULL,id,allocation_id,' . $allocation_id,
                'mobile' => 'required|string|min:1|max:15',
            ]);

            if ($validator->fails()) {
                return response()->json(['success'=>false,'data'=>'Validation Error','error'=>$validator->errors()],
                    404);
            }else{
                $data = $request->only('allocation_id','name','email','mobile','address','education','remark');
                $enroll = AllocationEnroll::create($data);
                return response()->json(['success'=>true, 'id'=>$enroll->id,'course'=>$course], 200);
            }
        } catch (Exception $exception) {
            return response()->json(['success'=>false]);
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enrollPayment(Request $request)
    {

        try {
            $allocation_id = $request->input('allocation_enroll_id');
            $validator = Validator::make($request->all(), [
                'allocation_enroll_id' => 'required',
                'amount' => 'required|integer',
                'payment_type' => 'nullable',
                'transaction' => 'required|unique:enroll_payments,transaction',
                'is_online' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response()->json(['success'=>false,'data'=>'Validation Error','error'=>$validator->errors()],
                    404);
            }else{
                $data = $request->only('allocation_enroll_id','amount','payment_type','is_online','transaction');
                $enroll = EnrollPayment::create($data);
                return response()->json(['success'=>true], 200);
            }
        } catch (Exception $exception) {
            return response()->json(['success'=>false]);
        }
    }

}
