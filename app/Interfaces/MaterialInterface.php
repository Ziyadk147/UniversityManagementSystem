<?php

namespace App\Interfaces;


interface MaterialInterface{

    public function storeMaterial($payload);

    public function getMaterialById($id);
    public function getMaterialsByCourseId($payload);
    public function storeFile($file , $coursename);

}
