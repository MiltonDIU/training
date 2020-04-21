<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllocationEnrollsFormRequest;
use App\Models\Allocation;
use App\Models\AllocationEnroll;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $allocations = Allocation::where('is_active', '1')->orderBy('last_date', 'desc')->get();
        $upcoming = Allocation::where('is_active', '2')->orderBy('last_date', 'desc')->get();
        $category_name = "All";
        return view('course.index',compact('allocations','category_name','upcoming'));
    }

    public function show(Request $request)
    {
        $id = $request['id'];
        $allocation = Allocation::with('venue', 'course', 'batch', 'teacher', 'day')->findOrFail($id);
        return view('course.show',compact('allocation'));
    }

//open course batch enrollment form
public function enrollForm(Request $request){
    $id = $request['id'];
    $allocation = Allocation::findOrFail($id);
    return view('enroll',compact('allocation'));
}


    public function enrollStore(AllocationEnrollsFormRequest $request)
    {

        try {
            $data = $request->getData();
            AllocationEnroll::create($data);
            $url =  url()->previous();
            return redirect()->route('tanks')
                ->with('success_message', 'Your request was successfully submit!')->with('url',$url);
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function enrollSave(Request $request)
    {
        return "";
    }

    public function category($category_slug)
    {

        $category = Category::where('slug',$category_slug)->first();
        $id=$category->id;
        $category_name = $category->name;
        $allocations = Allocation::where('is_active', 1)
            ->whereHas('course', function ($q) use ($id) {
                $q->where('category_id',$id);
            })->get();
        $upcoming = Allocation::where('is_active', 2)
            ->whereHas('course', function ($q) use ($id) {
                $q->where('category_id',$id);
            })->get();
        return view('course.index',compact('allocations','category_name','upcoming'));
    }

    public function teacherView($id,$name){
        $teacher = Teacher::find($id);
        //$completed = Allocation::where('is_active','3')->orderBy('last_date', 'desc')->get();
        $upcoming = Allocation::where('is_active','2')->orderBy('last_date', 'desc')->get();
        $running = Allocation::where('is_active','1')->orderBy('last_date', 'desc')->get();
        return view('course.teacher',compact('teacher','upcoming','running'));
    }
}
