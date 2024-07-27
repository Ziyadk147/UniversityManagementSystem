<?php


namespace App\Repositories;

use App\Interfaces\CourseInterface;
use App\Models\Course;

class CourseRepository implements  CourseInterface{

    protected  $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getAllCourses()
    {
        return $this->course->all();
    }

    public function storeCourse($payload)
    {
        return $this->course->create($payload);
    }

    public function findCourseById($id)
    {
        return $this->course->find($id);
    }


    public function getCourseClasses(Course $course){
        return $course->Class;
    }
    public function updateCourse($payload)
    {
        $course = $payload['course'];
        $name = $payload['name'];

        return $course->update(['name' => $name]);
    }

    public function destroyCourse($id)
    {
        $course = $this->findCourseById($id);

        return $course->delete($id);
    }
}
