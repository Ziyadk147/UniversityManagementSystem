@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Bind Permission</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form  action="{{route('permission.bindPermission')}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <select class="form-select" aria-label="Default select example" name="role" id="roledropdown">
                                <option selected disabled>Select a Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <table class="table" id="datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Permission</th>
                                    <th>Select</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->id}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td><input type="checkbox" id="permission-no-{{$permission->id}}" class="select-checkbox permission" name="selected_permission[]" value="{{$permission->id}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#roledropdown").on('change' , function () {
                $('.permission').prop('checked' , false);
                $.ajax({
                    url: '{{route('permission.getRolePermissions')}}',
                    type:'GET',
                    data: {
                        'token':'{{csrf_token() }}',
                        'id' : $(this).val()
                    },
                    success:function(success){
                        $.each(success.data , function(key , value) {
                            $("#permission-no-"+value).prop('checked' , true);
                        })
                    }
                })
            })
        })

    </script>
@endsection
