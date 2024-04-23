@extends('layouts.layout')
@section('content')
    <div class="row mt-7 position-absolute w-75 align-items-center">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 text-primary">Edit Material</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('material.update' , $material->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="" class="form-label">Material Name</label>
                            <input type="text" name="name" id=""  value="{{$material->name}}" class="form-control" placeholder="Enter material name"  required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Course</label>
                            <select name="course_id" id="" class="form-select" required>
                                <option value="#" disabled selected>Select a Course</option>
                                @foreach($courses as $course)

                                    <option value="{{$course->id}}" @if($material->course_id == $course->id)selected @endif >{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Upload Material</label>
                            <input type="file" name="file" id="" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
