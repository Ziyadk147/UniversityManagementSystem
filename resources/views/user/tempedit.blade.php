@extends('layouts.layout')
@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-header">
                    User Profile
                </div>
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-mt-3 text-center">
                            <img src="#" class="rounded">
                        </div>
                        <div class="col-mt-3">
                            <form action="{{route('user.update' , $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="form-group">
                                        <label for="" class="form-control-label">User Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="flag" value="1">
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
    </div>

@endsection
