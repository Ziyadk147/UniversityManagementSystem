@extends('layouts.layout')
@section('content')
        <div class= "row mt-7 align-items-center position-absolute w-75">
            <div class="col-lg-12">
                <div class="card z-index-2 h-100 shadow-lg ">
                    <div class="card-header pb-0 bg-transparent">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">
                                Create A New User
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">User Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Email Address</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-control-label">Role</label>
                                        <select class="form-select role" aria-label="Default select example" name="role" id="role">
                                            <option selected disabled>Select a Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5" id="classInput">

                                    </div>
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
        <script>
            $(document).ready( () => {

                $("#role").on('change' , () => {
                    let roleValue = $("#role").val();
                    let studentRoleValue = {{\Spatie\Permission\Models\Role::where("name" , "student")->get('id')[0]->id ?? null}};
                    let classInputDiv = $("#classInput");
                    if(roleValue == studentRoleValue){
                        console.log(roleValue);
                        let html = `
                                            <label for="" class="form-control-label">Class</label>
                                            <select class="form-select class" aria-label="Default select example" name="class" id="class">
                                            <option selected disabled>Select a Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                            </select>

`
                        classInputDiv.append(html);

                    }else{
                        classInputDiv.empty()
                    }

                })
            } )
        </script>

@endsection


