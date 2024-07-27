<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'capacity'

    ];


    public function Student()
    {

        return $this->hasMany(Student::class);

    }


    public function Course()
    {
        return $this->belongsToMany(Course::class , 'class_courses' , 'class_id' , 'course_id');
    }
}
