<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramEnrollsFormRequest;
use App\Models\Program;
use App\Models\ProgramEnroll;
use App\Models\ProgramType;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index($slug=null)
    {
if($slug!=null){
    $programType = ProgramType::where('slug',$slug)->first();
    $program_type_id = $programType->id;
    $programs = Program::where('is_active',1)->where('program_type_id',$program_type_id)->orderBy('begin_date', 'desc')->get();
}else{
    $programs = Program::where('is_active',1)->orderBy('begin_date', 'desc')->get();
}
        return view('program.index',compact('programs'));

    }

    public function show(Request $request)
    {
        $id = $request['id'];
        $program  = Program::findOrFail($id);
        return view('program.show',compact('program'));

    }

    //open program enrollment form
    public function enrollForm(Request $request){
        $id = $request['id'];
        $program = Program::findOrFail($id);
        return view('program_enroll',compact('program'));
    }
//store program enrollment form
    public function enrollStore(ProgramEnrollsFormRequest $request)
    {

        try {
            $data = $request->getData();
            ProgramEnroll::create($data);
            return redirect()->route('program.all')
                ->with('success_message', 'Your request was successfully submit!');
        } catch (Exception $exception) {
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
