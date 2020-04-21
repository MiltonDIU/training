<?php

namespace App\Http\Controllers\Admin;

use App\Models\Allocation;
use App\Models\Course;
use App\Models\AllocationEnroll;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllocationEnrollsFormRequest;
use Exception;
use Illuminate\Http\Request;

class AllocationEnrollsController extends Controller
{

    /**
     * Display a listing of the course enrolls.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $allocationEnrolls = AllocationEnroll::with('allocation')->paginate(25);

        return view('admin.allocation_enrolls.index', compact('allocationEnrolls'));
    }

    /**
     * Show the form for creating a new course enroll.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $allocations = Allocation::where('is_active',1)->get();
        return view('admin.allocation_enrolls.create', compact('allocations'));
    }

    /**
     * Store a new course enroll in the storage.
     *
     * @param App\Http\Requests\allocationEnrollsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(AllocationEnrollsFormRequest $request)
    {

        try {
            
            $data = $request->getData();
            AllocationEnroll::create($data);

            return redirect()->route('allocation_enrolls.allocation_enroll.index')
                             ->with('success_message', 'Batch Enroll was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified course enroll.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $allocationEnroll = AllocationEnroll::with('allocation')->findOrFail($id);
        return view('admin.allocation_enrolls.show', compact('allocationEnroll'));
    }

    /**
     * Show the form for editing the specified course enroll.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $allocationEnroll = AllocationEnroll::findOrFail($id);
        $allocation = Allocation::pluck('name','id')->all();

        return view('admin.allocation_enrolls.edit', compact('allocationEnroll','allocation'));
    }

    /**
     * Update the specified course enroll in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\allocationEnrollsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, AllocationEnrollsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $allocationEnroll = AllocationEnroll::findOrFail($id);
            $allocationEnroll->update($data);

            return redirect()->route('allocation_enrolls.allocation_enroll.index')
                             ->with('success_message', 'Course Enroll was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified course enroll from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $allocationEnroll = AllocationEnroll::findOrFail($id);
            $allocationEnroll->delete();

            return redirect()->route('allocation_enrolls.allocation_enroll.index')
                             ->with('success_message', 'Course Enroll was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
