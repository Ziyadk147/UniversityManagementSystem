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

    public function getMaterialsByCourseId($id)
    {
        $payload['course'] = $this->courseRepository->findCourseById($id);
        return $this->materialRepository->getMaterialsByCourseId($payload);
    }


}
