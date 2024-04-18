<?php


namespace App\Repositories;

use App\Interfaces\MaterialInterface;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class MaterialRepository implements MaterialInterface{

    protected $material;

    public function __construct(Material $material)
    {

        $this->material = $material;

    }

    public function storeMaterial($payload)
    {

        $course = $payload['course'];

        $file = $payload['file'];

        $name = $payload['name'];

        $filename = $this->storeFile($file , $course->name);

        DB::transaction(function () use($course, $filename ,$name){

            $course->Material()->create([

                'filename' => $filename,
                'name' => $name,

            ]);

        });
    }
    public function getMaterialsByCourseId($payload)
    {

        $course = $payload['course'];
        return $course->Material;

    }

    public function storeFile($file , $coursename)
    {
        $file = $file->store('files/'.$coursename.'/','public');
        $filePath = basename($file);
        return $filePath;

    }

}
