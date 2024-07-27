<?php

namespace App\Services;


use App\Models\Course;
use App\Repositories\CourseRepository;

class CourseService{

    protected  $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function getAllCourses()
    {
        return $this->courseRepository->getAllCourses();
    }

    public function storeCourse($request)
    {
        $payload['name'] = $request->name;

        return $this->courseRepository->storeCourse($payload);

    }

    public function findCourseById($id)
    {

        return $this->courseRepository->findCourseById($id);

    }

    public function getCourseClasses(Course $course){
        return $this->courseRepository->getCourseClasses($course);
    }


    public function updateCourse($request , $id)
    {

        $payload['course'] = $this->findCourseById($id);
        $payload['name'] = $request->name;

        return $this->courseRepository->updateCourse($payload);

    }

    public function destroyCourse($id)
    {
        return $this->courseRepository->destroyCourse($id);
    }
}
