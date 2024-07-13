@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">{{$courses->name}}'s Materials</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>File Name</th>
                                <th>Download</th>
                                @can("edit-material")
                                <th>Edit</th>
                                @endcan
                                @can("edit-delete")
                                <th>Delete</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($materials as $material)
                                    <tr>
                                        <td>{{$material->id}}</td>
                                        <td>{{$material->name}}</td>
                                        <td>{{$material->filename}}</td>
                                        <td>
                                            <a href="{{route('material.download' , ['id' => $material->id])}}">
                                                <button class="btn btn-sm btn-primary"><i class="fa-solid fa-download pr-3"></i>    Download</button>
                                            </a>
                                        </td>
                                        @can("edit-material")

                                        <td>
                                            <a href="{{route('material.edit',$material->id)}}">
                                                <button class="btn btn-sm btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        @endcan

                                            @can("delete-material")

                                        <td>
                                            <form action="{{route('material.destroy' , $material->id)}}" method="post">
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
