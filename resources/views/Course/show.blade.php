@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">{{$course->name}}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Capacity</th>
                                <th>Link</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as  $class)
                                <tr>
                                    <td>{{$class->id}}</td>

                                    <td>{{$class->name}}</td>

                                    <td>{{$class->capacity}}</td>

                                    <td>
                                        <a href="{{route('class.show' , $class->id)}}">
                                            <button class="btn btn-info btn-sm">
                                                Class Page
                                            </button>
                                        </a>
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
