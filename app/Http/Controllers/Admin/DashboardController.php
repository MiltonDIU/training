<?php

namespace App\Http\Controllers\Admin;

use App\Models\Allocation;
use App\Models\Course;
use App\Models\Program;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;
class DashboardController extends Controller
{
    public function index(){
        $total_course = Course::all()->count();
        $active_course = Course::where('is_active',1)->get()->count();

        $all_batch = Allocation::all()->count();
        $active_batch = Allocation::where('is_active',1)->get()->count();

        $total_program = Program::all()->count();
        $active_program = Program::where('is_active')->get()->count();
        $allocations = Allocation::orderBy('created_at', 'desc')->get()->take(10);
        $programs = Program::withCount('programEnroll')->where('is_active',1)->orderBy('created_at', 'desc')->get();
        //return view('admin.dashboard.index',compact('total_course','active_course','total_program','active_program','allocations','programs'));

        return view('admin.dashboard.index',compact('all_batch','active_batch','total_course','active_course','total_program','active_program','allocations','programs'));
    }
    public function profile(){
        $id = Auth::id();
        $user  = User::find($id);
        return view('admin.users.profile',compact('user'));
    }
    public function password(){
            $id = Auth::id();
            $user  = User::find($id);
            return view('admin.users.password',compact('user'));
    }
    public function passwordChange(Request $request){
        $id = Auth::id();
        //$data = $request->only(['name','username','identical','email']);
        $data['password'] = Hash::make($request->input('password'));
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->route('dashboard.profile.password')
            ->with('success_message', 'Password was successfully updated!');
    }
    public function avatar(){
        $id = Auth::id();
        $user  = User::find($id);
        return view('admin.users.avatar',compact('user'));
    }
    
    public function avatarUpdate(Request $request){
        $id = Auth::id();
        $user = User::findOrFail($id);
        $data = array();
        if ($request->hasFile('avatar')) {
            $uploadPath = public_path('/assets/uploads/avatar');
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('avatar')->move($uploadPath, $fileName);
            $data['avatar'] = $fileName;
            if(isset($user->avatar)) {
                $path = public_path('assets/uploads/avatar/' . $user->avatar);
                if (!File::exists($path)) {
                    unlink($path);
                }
            }
            $user->avatar = $fileName;
            $user->save();
        }
        return redirect()->route('admin.users.avatar')
            ->with('success_message', 'Profile was successfully updated!');
    }
}
