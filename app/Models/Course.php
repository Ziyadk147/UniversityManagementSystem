<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function Material()
    {
        return $this->hasMany(Material::class);
    }

    public function Student(){
        return $this->hasMany(Student::class , 'course_id' , "user_id" );
    }

    public function Class()
    {
        return $this->belongsToMany(Classes::class , 'class_courses' , 'class_id' , 'course_id');
    }

}
