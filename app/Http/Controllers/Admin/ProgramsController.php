<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProgramEnroll;
use App\Models\Venue;
use App\Models\Program;
use App\Models\Category;
use App\Models\ProgramType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramsFormRequest;
use Exception;
use App\Models\Day;
use App\Models\Teacher;
use DB;

class ProgramsController extends Controller
{

    /**
     * Display a listing of the programs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $programs = Program::with('venue', 'category', 'programtype')->get();

        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new program.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $venues = Venue::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        $programTypes = ProgramType::pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();

        $teachers = Teacher::pluck('name', 'id')->all();
        return view('admin.programs.create', compact('venues', 'categories', 'programTypes', 'days', 'teachers'));
    }

    /**
     * Store a new program in the storage.
     *
     * @param App\Http\Requests\ProgramsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ProgramsFormRequest $request)
    {
//dd($request);
        try {
            DB::beginTransaction();
            $data = $request->getData();

            if ($request->hasFile('banner')) {
                $uploadPath = public_path('/assets/uploads/program/banner');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('banner')->move($uploadPath, $fileName);
                $data['banner'] = $fileName;
            }
            $day_ids = $request->input('day_id');
            $teacher_id = $request->input('teacher_id');
            $begin_time = $request->input('begin_time');
            $close_time = $request->input('close_time');
            $program = Program::create($data);

            $program->teacher()->attach($teacher_id);
            foreach ($day_ids as $key => $day_id) {
                $program->day()->attach($day_id, array('begin_time' => $begin_time[$key], 'close_time' => $close_time[$key]));
            }

            DB::commit();
            return redirect()->route('programs.program.index')
                ->with('success_message', 'Program was successfully added!');

        } catch (Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!' .$exception]);
        }
    }

    /**
     * Display the specified program.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $program = Program::with('venue', 'category', 'programType')->findOrFail($id);

        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified program.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $venues = Venue::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        $programTypes = ProgramType::pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();

        $teachers = Teacher::pluck('name', 'id')->all();

        $selected_teachers = $program->teacher()->pluck('teacher_id')->toArray();
        $selected_days = $program->day()->pluck('day_id')->toArray();

        return view('admin.programs.edit', compact('program', 'venues', 'categories', 'programTypes', 'days', 'teachers', 'selected_teachers', 'selected_days'));
    }

    /**
     * Update the specified program in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProgramsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ProgramsFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->getData();
            $program = Program::findOrFail($id);
            if ($request->hasFile('banner')) {
                $uploadPath = public_path('/assets/uploads/program/banner');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('banner')->move($uploadPath, $fileName);
                $data['banner'] = $fileName;

                if ($program->banner != null) {
                    $existingPath = $program->banner;
                    unlink(public_path('assets/uploads/program/banner/' . $existingPath));
                }

            }

            $day_ids = $request->input('day_id');
            $teacher_id = $request->input('teacher_id');
            $begin_time = $request->input('begin_time');
            $close_time = $request->input('close_time');

            //dd($close_time);

            $program->update($data);
            $program->teacher()->sync($teacher_id);
            $syncDay = 1;
            $syncData = array();

            foreach ($day_ids as $key => $day_id) {
                $syncData[$syncDay] = array('day_id' => $day_id, 'begin_time' => $begin_time[$syncDay - 1], 'close_time' => $close_time[$syncDay - 1]);
                $syncDay++;
            }


            $program->day()->sync($syncData);

            DB::commit();
            return redirect()->route('programs.program.index')
                ->with('success_message', 'Program was successfully updated!');

        } catch (Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Remove the specified program from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $program = Program::findOrFail($id);
            $program->delete();

            return redirect()->route('programs.program.index')
                ->with('success_message', 'Program was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function enroll($id)
    {
        $program = Program::find($id);
        $programEnrolls = ProgramEnroll::where('program_id', $id)->paginate(100);
        return view('admin.programs.enroll_student', compact('programEnrolls', 'program'));
    }


}
