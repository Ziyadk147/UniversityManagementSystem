<?php


namespace App\Interfaces;

interface CourseInterface{

    public function getAllCourses();
    public function storeCourse($payload);
    public function findCourseById($id);
    public function updateCourse($payload);

}
