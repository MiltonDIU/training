<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeachersFormRequest;
use Exception;

class TeachersController extends Controller
{

    /**
     * Display a listing of the teachers.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $teachers = Teacher::where('is_active','1')->paginate(25);
        $inactiveTeachers = Teacher::where('is_active','0')->get();
        $teachersTrashed = Teacher::onlyTrashed()->get();
        return view('admin.teachers.index', compact('teachers','teachersTrashed','inactiveTeachers'));
    }

    /**
     * Show the form for creating a new teacher.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.teachers.create');
    }

    /**
     * Store a new teacher in the storage.
     *
     * @param App\Http\Requests\TeachersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(TeachersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            

            if ($request->hasFile('avatar')) {
                $uploadPath = public_path('/assets/uploads/avatar');
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('avatar')->move($uploadPath, $fileName);
                $data['avatar'] = $fileName;
            }
            Teacher::create($data);


            return redirect()->route('teachers.teacher.index')
                             ->with('success_message', 'Teacher was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified teacher.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $teacher = Teacher::withTrashed()->find($id);

        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $teacher = Teacher::withTrashed()->find($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified teacher in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\TeachersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, TeachersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $teacher = Teacher::withTrashed()->find($id);

            if ($request->hasFile('avatar')) {
                $uploadPath = public_path('/assets/uploads/avatar');
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('avatar')->move($uploadPath, $fileName);
                $data['avatar'] = $fileName;
                if ($teacher->banner != null) {
                    $existingPath = $teacher->banner;
                    unlink(public_path('assets/uploads/program/banner/' . $existingPath));
                }
            }

if ($teacher->trashed()){
    $data['deleted_at']=null;
}

            $teacher->update($data);

            return redirect()->route('teachers.teacher.index')
                             ->with('success_message', 'Teacher was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified teacher from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->delete();

            return redirect()->route('teachers.teacher.index')
                             ->with('success_message', 'Teacher was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
