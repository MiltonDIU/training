<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Program;
use App\Models\ProgramEnroll;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramEnrollsFormRequest;
use Exception;

class ProgramEnrollsController extends Controller
{

    /**
     * Display a listing of the program enrolls.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $programEnrolls = ProgramEnroll::with('course')->paginate(25);

        return view('admin.program_enrolls.index', compact('programEnrolls'));
    }

    /**
     * Show the form for creating a new program enroll.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $programs = Program::pluck('name','id')->all();
        
        return view('admin.program_enrolls.create', compact('programs'));
    }

    /**
     * Store a new program enroll in the storage.
     *
     * @param App\Http\Requests\ProgramEnrollsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProgramEnrollsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ProgramEnroll::create($data);

            return redirect()->route('program_enrolls.program_enroll.index')
                             ->with('success_message', 'Program Enroll was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified program enroll.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $programEnroll = ProgramEnroll::with('course')->findOrFail($id);

        return view('admin.program_enrolls.show', compact('programEnroll'));
    }

    /**
     * Show the form for editing the specified program enroll.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $programEnroll = ProgramEnroll::findOrFail($id);
        $courses = Course::pluck('name','id')->all();

        return view('admin.program_enrolls.edit', compact('programEnroll','courses'));
    }

    /**
     * Update the specified program enroll in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProgramEnrollsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProgramEnrollsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $programEnroll = ProgramEnroll::findOrFail($id);
            $programEnroll->update($data);

            return redirect()->route('program_enrolls.program_enroll.index')
                             ->with('success_message', 'Program Enroll was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified program enroll from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $programEnroll = ProgramEnroll::findOrFail($id);
            $programEnroll->delete();

            return redirect()->route('program_enrolls.program_enroll.index')
                             ->with('success_message', 'Program Enroll was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
