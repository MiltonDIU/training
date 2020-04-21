<?php

namespace App\Http\Controllers\Admin;

use App\Models\AllocationEnroll;
use App\Models\Day;
use App\Models\Teacher;
use App\Models\Venue;
use App\Models\Course;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesFormRequest;
use Exception;
use Illuminate\Http\Request;
use DB;

class CoursesController extends Controller
{

    /**
     * Display a listing of the courses.
     *
     */
    public function index()
    {
        $courses = Course::with('venue', 'category')->get();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     *
     */
    public function create()
    {
        $venues = Venue::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        $teachers = Teacher::pluck('name', 'id')->all();
        $days = Day::pluck('name', 'id')->all();

        return view('admin.courses.create', compact('venues', 'categories', 'teachers', 'days'));
    }

    /**
     * Store a new course in the storage.
     *
     */
    public function store(CoursesFormRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = $request->getData();
            if ($request->hasFile('banner')) {
                $uploadPath = public_path('/assets/uploads/course/banner');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('banner')->move($uploadPath, $fileName);
                $data['banner'] = $fileName;
            }
            Course::create($data);

            /*$day_ids = $request->input('day_id');
            $teacher_id = $request->input('teacher_id');
            $begin_time = $request->input('begin_time');
            $close_time = $request->input('close_time');
            $course = Course::create($data);

            $course->teacher()->attach($teacher_id);
            foreach ($day_ids as $key => $day_id) {
                $course->day()->attach($day_id, array('begin_time' => $begin_time[$key], 'close_time' => $close_time[$key]));
            }
            */
            DB::commit();

            return redirect()->route('courses.course.index')
                ->with('success_message', 'Course was successfully added!');

        } catch (Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    /**
     * Display the specified course.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $course = Course::with('venue', 'category')->findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified course.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        //$venues = Venue::pluck('name', 'id')->all();
        $categories = Category::pluck('name', 'id')->all();
        //$teachers = Teacher::pluck('name', 'id')->all();
        //$days = Day::pluck('name', 'id')->all();
        //$selected_teachers = $course->teacher()->pluck('teacher_id')->toArray();
        //$selected_days = $course->day()->pluck('day_id')->toArray();

        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified course in the storage.
     *
     * @param  int $id
     */
    public function update($id, CoursesFormRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = $request->getData();
            $course = Course::findOrFail($id);
            if ($request->hasFile('banner')) {
                $uploadPath = public_path('/assets/uploads/course/banner');
                $extension = $request->file('banner')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('banner')->move($uploadPath, $fileName);
                $data['banner'] = $fileName;
                if ($course->banner != null) {
                    $existingPath = $course->banner;
                    unlink(public_path('assets/uploads/course/banner/' . $existingPath));
                }
            }
            $course->update($data);
            /*
            $day_ids = $request->input('day_id');
            $teacher_id = $request->input('teacher_id');
            $begin_time = $request->input('begin_time');
            $close_time = $request->input('close_time');

            //dd($close_time);

            $course->update($data);
            $course->teacher()->sync($teacher_id);
            $syncDay = 1;
            $syncData = array();

            foreach ($day_ids as $key => $day_id) {
                $syncData[$syncDay] = array('day_id' => $day_id, 'begin_time' => $begin_time[$syncDay - 1], 'close_time' => $close_time[$syncDay - 1]);
                $syncDay++;
            }
            $course->day()->sync($syncData);
*/
            DB::commit();
            return redirect()->route('courses.course.index')
                ->with('success_message', 'Course was successfully updated!');
        } catch (Exception $exception) {
            DB::rollback();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }

    }

    /**
     * Remove the specified course from the storage.
     *
     * @param  int $id
     *
     */
    public function destroy($id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->delete();

            return redirect()->route('courses.course.index')
                ->with('success_message', 'Course was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function enroll($id)
    {
        $course = Course::find($id);
        return view('admin.courses.enroll_student', compact( 'course'));
    }

    public function daySet($begin_time, $close_time, $day_ids, $course)
    {

        foreach ($day_ids as $key => $day_id) {
            $course->day()->attach($day_id, ['begin_time' => $begin_time[$key], 'close_id' => $close_time[$key]]);
        }
    }

}
