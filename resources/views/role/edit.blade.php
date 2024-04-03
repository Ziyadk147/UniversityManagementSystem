@extends('layouts.layout')

@section('content')
    <div class= "row mt-7 align-items-center position-absolute w-75">
        <div class="col-lg-12">
            <div class="card z-index-2 h-100 shadow-lg ">
                <div class="card-header pb-0 bg-transparent">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">
                            Edit Role
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('role.update' , $role->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="" class="form-control-label">Role Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$role->name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
