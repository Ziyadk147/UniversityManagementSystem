<?php


namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\MaterialRepository;

class MaterialService {

    protected $materialRepository , $courseRepository;
    public function __construct(MaterialRepository $materialRepository , CourseRepository $courseRepository)
    {
        $this->materialRepository = $materialRepository;
        $this->courseRepository = $courseRepository;
    }

    public function storeMaterial($request)
    {
        $payload['course'] = $this->courseRepository->findCourseById($request->course_id);
        $payload['file'] = $request->file('file');
        $payload['name'] = $request->name;

        return $this->materialRepository->storeMaterial($payload);
     }

    public function getMaterialById($id)
    {
        return $this->materialRepository->getMaterialById($id);
    }
    public function getMaterialsByCourseId($id)
    {
        $payload['course'] = $this->courseRepository->findCourseById($id);
        return $this->materialRepository->getMaterialsByCourseId($payload);
    }

    public function updateMaterial($request , $id)
    {
        $material = $this->getMaterialById($id);
        $course = $this->courseRepository->findCourseById($material->course_id);
        $file = $request->file('file');
        return $this->materialRepository->updateMaterial($request  , $course , $material , $file);
    }

    public function destroyMaterial($id)
    {
        $material = $this->getMaterialById($id);
        $course = $this->courseRepository->findCourseById($material->course_id);

        return $this->materialRepository->destroyMaterial($material , $course);
    }

}

