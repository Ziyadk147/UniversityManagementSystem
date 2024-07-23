<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Services\ClassService;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    protected $classService;


    public function __construct(ClassService $classService)
    {
        $this->classService  = $classService;
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
    public function show(Classes $classes)
    {
        //
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
