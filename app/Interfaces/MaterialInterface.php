<?php

namespace App\Interfaces;


interface MaterialInterface{

    public function storeMaterial($payload);

    public function getMaterialById($id);
    public function getMaterialsByCourseId($payload);
    public function storeFile($file , $coursename);

    public function updateMaterial($request  , $course , $material , $file);

    public function destroyMaterial($material , $course);
}
