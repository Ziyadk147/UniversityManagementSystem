<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Services\ClassService;
use App\Services\CourseService;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    protected $classService , $courseService;


    public function __construct(ClassService $classService , CourseService $courseService)
    {
        $this->classService  = $classService;
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = $this->classService->getAllClasses();
        return view('class.index' , compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload['name'] = $request->name;
        $payload['capacity'] = $request->capacity;

        $this->classService->storeClass($payload);

        return to_route('class.index')->with("success" , "class created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payload = $this->classService->getClassCourses($id);
        $payload['students'] = $this->classService->getClassById($id)->Student;

//        dd($payload);
        return view('class.show' , $payload);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//        dd($id);
        $class = $this->classService->getClassById($id);
        return view('class.edit' , compact('class'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class = $this->classService->updateClass($request , $id);

        return to_route('class.index')->with("success" , "class updated successfully");
    }

    public function bindCourseToClass()
    {
        $payload['classes'] = $this->classService->getAllClasses();
        $payload['courses'] = $this->courseService->getAllCourses();


        return view("class.bind" , $payload) ;
    }

    public function bindStore(Request $request)
    {
            $this->classService->bindCourseToClass($request);
            return to_route('class.index');
    }

    public function getCourses(Request $request){

        $classId = $request->class_id;
        $courses = $this->classService->getClassCourses($classId);

        return response($courses , 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $class = $this->classService->getClassById($id);
        $class->delete();
        return to_route("class.index")->with("success" , "class deleted successfully");
    }
}
