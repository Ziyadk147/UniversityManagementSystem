<?php

namespace App\Repositories;

use App\Interfaces\ClassInterface;
use App\Models\Classes;

class ClassRepository implements ClassInterface
{
    protected  $class;

    public function __construct(Classes $class)
    {
        $this->class = $class;
    }

    public function getAllClasses()
    {
        return $this->class->all();
    }

    public function storeClass($data)
    {

        return $this->class->create($data);

    }

    public function getClassById($id)
    {
        return $this->class->find($id);
    }

    public function updateClass($payload , $class)
    {
        if($payload['capacity'] >= $class->student_quantity){

            return $class->update($payload);

        }

    }

    public function getClassCourses($id)
    {
        $class = $this->getClassById($id);
        $payload["class"] = $class;
        $payload["courses"] = $class->Course ?? null;
        return $payload;

    }

    public function bindCourseToClass($data)
    {
//        dd($data);
        $class = $this->getClassById($data->class);
        return $class->Course()->sync($data->course);
    }

}
