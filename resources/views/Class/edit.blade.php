@extends('layouts.layout')

@section('content')
    <div class= "row mt-7 align-items-center position-absolute w-75">
        <div class="col-lg-12">
            <div class="card z-index-2 h-100 shadow-lg ">
                <div class="card-header pb-0 bg-transparent">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">
                            Create A New Course
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('class.update' , $class->id)}}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="" class="form-control-label"> Class Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$class->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Capacity</label>
                                    <input type="number" class="form-control" name="capacity" min="0"  max="100" value="{{$class->capacity}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
