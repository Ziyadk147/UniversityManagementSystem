<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseService->getAllCourses();
        return view('course.index' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = $this->courseService->storeCourse($request);
        return to_route('course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {

        $payload['classes'] = $this->courseService->getCourseClasses($course);
        $payload['course'] = $course;
        return view("course.show" , $payload);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = $this->courseService->findCourseById($id);
        return view('course.edit' , compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $course = $this->courseService->updateCourse($request , $id);
        return to_route('course.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->courseService->destroyCourse($id);
        return to_route('course.index');
    }
}
