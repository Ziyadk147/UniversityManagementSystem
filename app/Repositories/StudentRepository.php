<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentInterface
{
    protected $student;
    public function __construct(Student $student)
    {
        $this->student = $student;
    }
    public function getAllStudents()
    {
        return Student::select("*")
                    ->join('users' , 'students.user_id' , '=' , 'users.id')->get();
    }
}
