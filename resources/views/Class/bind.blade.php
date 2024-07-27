@extends('layouts.layout')

@section('content')
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Classes</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('class.bindStore')}}" method="post">
                        @method("post")
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="courseClassSelect" class="fs-2">Class</label>
                                <select name="class" class="form-control" id="courseClassSelect" required>
                                    <option value="" selected disabled>Select Your Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}" >{{$class->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <label for="courseClassSelect" class="fs-2">Courses</label>
                                <select name="course[]" class="form-control" id="courseSelect" multiple="multiple" required>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-4 text-right">
                            <div class="col align-content-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <script src="{{asset('assets/js/core/deletefunction.js')}}" type="tasdext/javascript"></script>
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
            let classSelect = $("#courseClassSelect");
            let courseSelect = $("#courseSelect")

            classSelect.select2();
            courseSelect.select2();

            classSelect.on('change' , () => {
                let classId = classSelect.val()
            
                $.ajax({
                        url:    "{{route("class.getCourses")}}",
                        type:   "POST",
                        data: {
                            "_token" : `{{csrf_token()}}`,
                            "class_id" : classId, 
                        },
                        success: (message) =>{
                            let courses = message.courses;
                            let selected = [];
                            $("#courseSelect > option").each( (key , value) => {
                                let val = parseInt(value.value) ;
                            
                                $.each(courses , (index , property) => {
                                    console.log([value , property.id])
                                    if(val === property.id){
                                       selected.push(property.id)
                                    }                                
                                })
                                
                            })
                            courseSelect.val(selected);
                            courseSelect.trigger("change");
                        }
                })

            })


        });
    </script>
@endsection
