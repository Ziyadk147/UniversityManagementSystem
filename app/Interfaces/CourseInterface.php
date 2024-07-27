<?php


namespace App\Interfaces;
use App\Models\Course;

interface CourseInterface{

    public function getAllCourses();
    public function storeCourse($payload);
    public function findCourseById($id);
    public function updateCourse($payload);

    public function getCourseClasses(Course $course);

}
