<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    protected $filleable = [
        'rate',
    ];

    function user(){
        return $this -> belongsTo(User::class);
    }

    function post(){
        return $this -> belongsTo(Post::class);
    }
    use HasFactory;
}
