@extends('layouts.layout')

@section('content')
    <div class="row mt-7 position-absolute align-items-center w-75">
        <div class="col">
            <div class="card shadow mb-4">

                <div class="card-header mb-4">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 text-primary font-weight-bold">Materials</h2>
                        </div>
                        <div class="col">
                            <a href="{{route('material.create')}}"><button class="btn btn-primary">Add a Material</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($courses as $course)
                        <div class="row ">
                            <div class="col m-2 ">
                                <a href="{{route('material.show' , $course->id)}}">
                                    <div class="card shadow ">
                                        <div class="card-header coursecard">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="m-0 text-primary">{{$course->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
