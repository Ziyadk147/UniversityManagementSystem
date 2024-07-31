<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Class(){
        return $this->belongsTo(Classes::class);
    }


}
