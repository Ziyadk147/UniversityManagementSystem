@extends('layouts.layout')

@section('content')
    <div class="row mt-7 position-absolute align-items-center w-75">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h2 class="m-0 text-primary">{{$material->name}}'s Materials</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
