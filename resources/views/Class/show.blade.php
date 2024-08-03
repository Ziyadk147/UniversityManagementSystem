@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">{{$class->name}}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Link</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>
                                        <a href="{{route("course.show" , $course->id)}}">
                                            <button class="btn btn-info btn-sm">
                                                Go to Course
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                    <div class="table-responsive mt-5">
                        <div class="row">
                            <div class="col">
                                <h2 class="m-0 font-weight-bold text-primary">{{$class->name}}'s Enrolled Students</h2>
                            </div>
                        </div>

                        <table class="table " id="studentTable" width="100%" cellspacing="">
                            <thead>
                            <tr>
                                <th width="15%">ID</th>
                                <th>Student Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->User->name}}</td>
                                    <td>{{$student->User->email}}</td>
{{--                                    <td>--}}
{{--                                        <a href="{{route("course.show" , $student->id)}}">--}}
{{--                                            <button class="btn btn-info btn-sm">--}}
{{--                                                Go to Course--}}
{{--                                            </button>--}}
{{--                                        </a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                'responsive':true,
                "autowidth" : true,
            });
            $('#studentTable').DataTable({
                "bInfo": false,
                // "scrollY": '70vh',
                // "scrollCollapse": true,
                // "scrollX": true,
                // 'responsive':true,
                // "autowidth" : true,
            });
        });
    </script>
@endsection
