<?php

namespace App\Http\Controllers;

use App\Models\Program;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Program::where(['is_active'=>1,'program_type_id'=>2])->orderBy('begin_date', 'desc')->paginate(10);
        return view('seminar.index',compact('seminars'));
    }

    public function show($slug)
    {
        $seminar  = Program::where('slug',$slug)->first();
        return view('seminar.show',compact('seminar'));
    }
}
