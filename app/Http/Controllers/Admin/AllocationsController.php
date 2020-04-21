<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AllocationFormRequest;
use App\Models\Allocation;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Day;
use App\Models\Teacher;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AllocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allocations = Allocation::all();
        $completed = Allocation::where('is_active','3')->get();
        $upcoming = Allocation::where('is_active','2')->get();
        $running = Allocation::where('is_active','1')->get();

        return view('admin.allocations.index', compact('allocations','completed','upcoming','running'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::where('is_active', 1)->pluck('name', 'id');
        $batch = Batch::pluck('name', 'id');
        $venues = Venue::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        $days = Day::pluck('name', 'id');
        return view('admin.allocations.create', compact('venues', 'batch', 'teachers', 'days', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AllocationFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only('course_id', 'batch_id', 'venue_id', 'last_date', 'course_start_date', 'course_end_date', 'total_hour', 'total_class', 'fees', 'discount_fees');

            if ($request->input('is_active')) {
                $data['is_active'] = $request->input('is_active');
            } else {
                $data['is_active'] = 0;
            }

            if ($request->input('batch_is_show')) {
                $data['batch_is_show'] = $request->input('batch_is_show');
            } else {
                $data['batch_is_show'] = 0;
            }

            if ($request->input('is_schedule')) {
                $data['is_schedule'] = 1;
            } else {
                $data['is_schedule'] = 0;
            }
            $day_ids = $request->input('day_id');
            $teacher_id = $request->input('teacher_id');
            $begin_time = $request->input('begin_time');
            $close_time = $request->input('close_time');
            $allocation = Allocation::create($data);
            $allocation->teacher()->attach($teacher_id);
            foreach ($day_ids as $key => $day_id) {
                $allocation->day()->attach($day_id, array('begin_time' => $begin_time[$key], 'close_time' => $close_time[$key]));
            }

            DB::commit();

            return redirect()->route('allocations.allocation.index')
                ->with('success_message', 'Allocation was successfully added!');
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $allocation = Allocation::with('venue', 'course', 'batch', 'teacher', 'day')->findOrFail($id);
        
        return view('admin.allocations.show', compact('allocation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $allocation = Allocation::findOrFail($id);
        $courses = Course::pluck('name', 'id');
        $batch = Batch::pluck('name', 'id');
        $venues = Venue::pluck('name', 'id');
        $teachers = Teacher::pluck('name', 'id');
        $days = Day::pluck('name', 'id');
        $selected_teachers = $allocation->teacher()->pluck('teacher_id')->toArray();
        $selected_days = $allocation->day()->pluck('day_id')->toArray();
        return view('admin.allocations.edit', compact('selected_days', 'selected_teachers', 'allocation', 'venues', 'batch', 'teachers', 'days', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'venue_id' => 'required',
            'last_date' => 'required',
            'course_start_date' => 'required',
            'teacher_id' => 'required|array',
            'day_id' => 'required|array',
            'begin_time' => 'required|array',
            'close_time' => 'required|array',

        ]);


        try {
            DB::beginTransaction();
            $data = $request->only('venue_id', 'last_date', 'course_start_date', 'course_end_date', 'total_hour', 'total_class', 'fees', 'discount_fees','is_active');
            if ($request->input('is_schedule')) {
                $data['is_schedule'] = 1;
            } else {
                $data['is_schedule'] = 0;
            }
            if ($request->input('batch_is_show')) {
                $data['batch_is_show'] = $request->input('batch_is_show');
            } else {
                $data['batch_is_show'] = 0;
            }



            $allocation = Allocation::findOrFail($id);

            $day_ids = $request->input('day_id');
            $teacher_id = $request->input('teacher_id');
            $begin_time = $request->input('begin_time');
            $close_time = $request->input('close_time');

            $allocation->update($data);
            $allocation->teacher()->sync($teacher_id);
            $syncDay = 1;
            $syncData = array();
            foreach ($day_ids as $key => $day_id) {
                $syncData[$syncDay] = array('day_id' => $day_id, 'begin_time' => $begin_time[$syncDay - 1], 'close_time' => $close_time[$syncDay - 1]);
                $syncDay++;
            }
            $allocation->day()->sync($syncData);
            DB::commit();
            return redirect()->route('allocations.allocation.index')
                ->with('success_message', 'Allocation was successfully added!');
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $allocation = Allocation::findOrFail($id);
            $allocation->delete();

            return redirect()->route('allocations.allocation.index')
                ->with('success_message', 'Batch wise Course was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
