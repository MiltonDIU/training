<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Program::where(['is_active'=>1,'program_type_id'=>1])->orderBy('begin_date', 'desc')->paginate(10);
        return view('workshop.index',compact('workshops'));
    }

    public function show($slug)
    {
        $workshop  = Program::where('slug',$slug)->first();
        return view('workshop.show',compact('workshop'));
    }
}