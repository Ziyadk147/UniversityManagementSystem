@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Permissions</h2>
                        </div>
                        <div class="col-sm-6 text-right">

                            <a href="{{route('permission.create')}}"><button class="btn btn-primary btn-sm">Create New Permission</button></a>
                            <a href="{{route('permission.bind')}}"><button class="btn btn-primary btn-sm">Bind Permission To Role</button></a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>permission</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)

                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>
                                            <a href="{{route('permission.edit',$permission->id)}}">
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                            </a>
                                    </td>
                                    <td>
                                        <form action="{{route('permission.destroy' , $permission->id)}}" method="post">
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
