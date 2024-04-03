@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Roles</h2>
                        </div>
                        <div class="col-sm-4 text-right">
                            <a href="{{route('role.create')}}"><button class="btn btn-primary btn-sm">Create New Role</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)

                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a href="{{route('role.edit',$role->id)}}">
                                            <button class="btn btn-sm btn-primary">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('role.destroy' , $role->id)}}" method="post">
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

    <script>
        $(document).ready(function(){
            new DataTable('#datatable',{
                "bPaginate": true,
                "bInfo": false,
                "scrollY": '70vh',
                "scrollCollapse": true,
                "scrollX": true,
                //responsive:true
            });
        });

    </script>
@endsection
