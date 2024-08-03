<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'capacity',
        'student_quantity'

    ];


    public function Student()
    {

        return $this->hasMany(Student::class , 'class_id' , 'id');

    }


    public function Course()
    {
        return $this->belongsToMany(Course::class , 'class_courses' , 'class_id' , 'course_id');
    }
}
