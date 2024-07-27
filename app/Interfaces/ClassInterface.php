<?php

namespace App\Interfaces;

interface ClassInterface
{
    public function getAllClasses();


    public function storeClass($data);

    public function getClassCourses($id);

    public function bindCourseToClass($data);

}
