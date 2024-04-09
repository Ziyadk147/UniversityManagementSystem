@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Historical Announcements</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Announcement</th>
                                <th>Created By</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($announcements as $announcement)

                                <tr>
                                    <td>{{$announcement->id}}</td>
                                    <td>{{$announcement->text}}</td>
                                    <td>{{$announcement->created_by_name}}</td>
                                    <td>
                                        <form action="{{route('announcement.destroy' , $announcement->id)}}" method="post">
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
            console.log(window.location.pathname.split('/')[1])
            $('#dataTable').DataTable({
                "bInfo": false,
                "scrollY": '70vh',
                "scrollCollapse": true,
                "scrollX": true,
                'order': [[0,'DESC']],
                'responsive':true,
                'paginate':true
            });
        });

    </script>
@endsection
