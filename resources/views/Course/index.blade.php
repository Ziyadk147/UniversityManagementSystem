@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Courses</h2>
                        </div>
                        <div class="col-sm-4 text-right">

                            <a href="{{route('course.create')}}"><button class="btn btn-primary btn-sm">Create New Course</button></a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as  $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>
                                        <a href="{{route('course.edit',$course->id)}}">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('course.destroy' , $course->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{asset('assets/js/core/deletefunction.js')}}" type="text/javascript"></script>
    <script>

        $(document).ready(function(){
            console.log(window.location.pathname.split('/')[1])
            $('#dataTable').DataTable({
                "bInfo": false,
                "scrollY": '70vh',
                "scrollCollapse": true,
                "scrollX": true,
                'responsive':true
            });
        });
    </script>
@endsection
