@extends('layouts.layout')
@section('content')
    <style>
        .img{

            width:300px;


        }
    </style>
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow-lg">
                <div class="card-header">
                    User Profile
                </div>
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-mt-3 text-center">
                            <img src="{{asset('/storage/images/userImages/'.\Illuminate\Support\Facades\Auth::id().'/'.$user->Image->filename)}}" class="img img-thumbnail shadow-xl border-radius-2xl border-5">
                        </div>
                        <div class="col-mt-3">
                            <form action="{{route('user.profileUpdate')}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-control-label">User ID</label>
                                    <input type="text" class="form-control" name="id" value="{{$user->id}}" readonly>
                                </div>
                                <div class="form-group">
                                        <label for="" class="form-control-label">User Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Change Photo</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
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
