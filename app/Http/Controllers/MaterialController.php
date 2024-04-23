<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Services\CourseService;
use App\Services\MaterialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $materialService , $courseService;

    public function __construct(MaterialService $materialService,CourseService $courseService)
    {
        $this->materialService = $materialService;
        $this->courseService=  $courseService;
    }

    public function index()
    {

        $courses = $this->courseService->getAllCourses();

        return view('material.selection' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $courses = $this->courseService->getAllCourses();
        return view('material.create' , compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $material = $this->materialService->storeMaterial($request);
        return to_route('material.show' , $request->course_id);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $material = $this->materialService->getMaterialsByCourseId($id);
        $course = $this->courseService->findCourseById($id);
        $payload['materials'] = $material;
        $payload['courses'] = $course;
        return view('material.index' , $payload);
    }


    public function downloadFile($id)
    {
        $material = $this->materialService->getMaterialById($id);
        $course = $this->courseService->findCourseById($material->course_id);
        return Storage::disk('public')->download('files/'.$course->name.'/'.$material->filename);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $payload['courses']  = $this->courseService->getAllCourses();
        $payload['material'] = $material;

        return view('material.edit' , $payload);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $payload['material'] = $this->materialService->updateMaterial($request , $id);
//        $payload['course'] = $this->courseService->findCourseById($payload['material']->course_id);
        return to_route('material.index' , $payload);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course_id = $this->materialService->destroyMaterial($id);

        return to_route('material.index' );
    }
}
