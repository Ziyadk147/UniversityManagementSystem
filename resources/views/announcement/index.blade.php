@extends('layouts.layout')
@section('content')
    <style>
        .new-card{
            opacity: 0 ;
            transition:opacity 0.5s ease-in-out;
        }
        .new-card.animated{
            opacity:1;
        }
    </style>
    <div class="row mt-7 align-items-center position-absolute w-75">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                </div>
                <div class="card-body bg-gray-200">
                    <div class="row">
                        <div class="col-lg-11">
                            <div class="card bg-gray-100">
                                <div class="card-body" id="announcementMessages">
                                    @foreach($announcements as $announcement)
                                        <div class="row mb-6 cardid">
                                            <div class="col">
                                                <div class="card shadow-lg">
                                                    <div class="card-header  h-25 bg-primary m-0 text-white ">
                                                        <div class="row">
                                                            <div class="col text-sm overflow-visible text-bolder">
                                                                <span>{{$announcement->created_by_name}}</span>
                                                            </div>
                                                            <div class="col  text-sm overflow-visible text-bolder text-end">
                                                                <span>{{$announcement->created_at}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        {{$announcement->text}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-4 w-lg-100">
                            <div class="row">
                                    @can("create-announcement")
                                    <div class="col-lg-11">
                                        <input type="text" class=" p-2 input-group" id="textBox" placeholder=" Enter a message">
                                    </div>
                                    <div class="col-lg-1">
                                        <button class="btn btn-primary" id="sendButton">Send</button>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#sendButton").on('click' , function () {
               let textBox = $('#textBox').val();
                $.ajax({
                    type:"POST",
                    url:'{{route('announcement.store')}}',
                    data:{
                        '_token' : "{{csrf_token()}}",
                        'data': textBox,
                    },
                    success:function (success) {
                        let totalCards = $('#announcementMessages .cardid').length;
                        let created_by =success.data.created_by_name;
                        let text = success.data.text;
                        let created_at = success.data.created_at;
                        let html = `
                                        <div class="row mb-6 new-card cardid">
                                            <div class="col">
                                                <div class="card shadow-lg">
                                                    <div class="card-header  h-25 bg-primary m-0 text-white ">
                                                        <div class="row">
                                                            <div class="col text-sm overflow-visible text-bolder">
                                                                <span>${created_by}</span>
                                                            </div>
                                                            <div class="col  text-sm overflow-visible text-bolder text-end">
                                                                <span>${created_at}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        ${text}
                                                     </div>
                                                </div>
                                            </div>
                                        </div>`
                            // $("#announcementMessages .row").first().remove();
                        if(totalCards > 4){
                            $("#announcementMessages .row").first().remove()
                            console.log(totalCards);
                        }
                        let newCard = $(html);
                        $("#announcementMessages").append(newCard);
                        $("#textBox").val(" ");
                        newCard.css('opacity', 0); // Start hidden
                        newCard.animate({ opacity: 1 }, { // Animate to visible
                            duration: 200, // Adjust duration as needed (in milliseconds)
                            easing: 'swing' // Choose easing function (e.g., 'swing', 'linear', 'easeInOut')
                        });
                    }
                })
            })
        })
    </script>
@endsection
