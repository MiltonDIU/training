<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Program;
use Session;
class SiteController extends Controller
{

    public function index()
    {

        $programs = Program::where('is_active',1)->orderBy('begin_date', 'desc')->paginate(5);
        $allocations = Allocation::where('is_active', '1')->orderBy('last_date', 'desc')->get();
        $upcoming = Allocation::where('is_active', '2')->orderBy('last_date', 'desc')->get();
        return view('index',compact('allocations','programs','upcoming'));

    }

    public function resourcePerson($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher-view', compact('teacher'));
    }
    /*
     * After enroll the course then show this page
     * */
    public function thankYou(){
        if(Session::has('success_message')){
            $url = session('url');
            return view('thanks',compact('url'));
        }else{
           return redirect('/');
        }
    }

    public function onlineCourse()
    {
        $allocations = Allocation::where('is_active', '2')->where('is_online_home','1')->orderBy('last_date', 'desc')->get();

        return view('course.online-course',compact('allocations'));

    }
}
