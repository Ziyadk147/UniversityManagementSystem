<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Services\CourseService;
use App\Services\MaterialService;
use Illuminate\Http\Request;

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
        return view('material.index' , compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
