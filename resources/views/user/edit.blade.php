@extends('layouts.layout')
@section('content')
    <div class= "row mt-7 align-items-center position-absolute w-75">
        <div class="col-lg-12">
            <div class="card z-index-2 h-100 shadow-lg ">
                <div class="card-header pb-0 bg-transparent">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">
                            Edit User
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{route('user.update' , $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="" class="form-control-label">User Name</label>
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-control-label">Email Address</label>
                                    <input type="email" class="form-control" value="{{$user->email}}" name="email">
                                </div>
                                <div class="mb-5">
                                    <label for="" class="form-control-label">Role</label>
                                    <select class="form-select" aria-label="Default select example" name="role" id="roledropdown">
                                        <option selected disabled>Select a Role</option>
                                        @foreach($roles as $role)
                                            <option   @if($userRole[0] == $role->name) selected @endif  value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="flag" value="0">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
