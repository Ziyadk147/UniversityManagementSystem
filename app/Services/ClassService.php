<?php

namespace App\Services;

use App\Repositories\ClassRepository;

class ClassService
{

    protected  $classRepository;

    public function __construct(ClassRepository $classRepository)
    {

        $this->classRepository = $classRepository;

    }

    public function getAllClasses()
    {
        return $this->classRepository->getAllClasses();
    }

    public function storeClass($data)
    {

        return $this->classRepository->storeClass($data);

    }


    public function getClassById($id)
    {
        return $this->classRepository->getClassById($id);
    }

    public function updateClass($request , $id)
    {
        $class = $this->classRepository->getClassById($id);

        $payload["name"] = $request->name;
        $payload["capacity"] = $request->capacity;


        return $this->classRepository->updateClass($payload , $class);
    }
}
