<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['text' , 'user_id' ,'created_by_name' ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
