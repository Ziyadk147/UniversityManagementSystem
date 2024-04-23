<?php


namespace App\Repositories;

use App\Interfaces\MaterialInterface;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\FalseType;

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


        DB::transaction(function () use($course, $file ,$name){

            $filename = $this->storeFile($file , $course->name);

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

    public function getMaterialById($id)
    {
        return $this->material->find($id);
    }
    public function storeFile($file , $coursename)
    {

        $file = $file->store('files/'.$coursename.'/','public');

        $filePath = basename($file);

        return $filePath;

    }

    public function updateMaterial($request , $course , $material , $file)
    {
        DB::transaction(function() use($request , $course , $material , $file){

            $this->deleteFile($course->Material->toArray()[0]['filename'] , $course->name);

            $filename =  $this->storeFile($file, $course->name);

            $material->update([
               'filename' => $filename,
            ]);
            return $course->Material;
        });

    }

    public function deleteFile($file , $coursename)
    {
      if(Storage::disk('public')->delete('files/'.$coursename.'/'.$file)){
        return true;
      }
      else{
          throw new \Error('File Not Deleted');
      }

    }

    public function destroyMaterial($material , $course)
    {
        DB::transaction(function() use($material ,$course){
            $this->deleteFile($material->filename , $course->name);
            $material->delete();
            return $course->id; //returning course id to get back to the courses page
        });
    }
}
