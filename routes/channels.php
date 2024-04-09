<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('announcement-app' , function ($user){
    return \Illuminate\Support\Facades\Auth::check();
});
