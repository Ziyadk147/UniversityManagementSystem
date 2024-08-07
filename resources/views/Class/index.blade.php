@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Classes</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                                <a href="{{route('class.create')}}"><button class="btn btn-primary btn-sm">Create New class</button></a>
                                <a href="{{route('class.bind')}}"><button class="btn btn-info btn-sm">Bind Courses To Class</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Class</th>
                                <th>Capacity</th>
                                <th>Students Enrolled</th>
                                @can("edit-user")
                                    <th>Edit</th>
                                @endcan
                                <th>Show</th>
                                @can("delete-user")
                                    <th>Delete</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $class)

                                <tr>
                                    <td>{{$class->id}}</td>
                                    <td>{{$class->name}}</td>
                                    <td>{{$class->capacity}}</td>
                                    <td>{{$class->student_quantity}}</td>
                                    @can("edit-user")

                                        <td>
                                            <a href="{{route('class.edit',$class->id)}}">
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                            </a>
                                        </td>
                                    @endcan
                                    <td>
                                        <a href="{{route('class.show' , $class->id)}}">
                                            <button class="btn btn-sm btn-info">View</button>
                                        </a>
                                    </td>
                                    @can("delete-user")

                                        <td>
                                            <form action="{{route('class.destroy' , $class->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    @endcan
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
