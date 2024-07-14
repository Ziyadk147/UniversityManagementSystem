<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\Student;

class StudentRepository implements StudentInterface
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

}
