<?php

namespace app\Services;

use App\Models\Student;
use App\Repositories\StudentRepository;

class StudentService{

    protected  $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudents()
    {
        return $this->studentRepository->getAllStudents();
    }
}
