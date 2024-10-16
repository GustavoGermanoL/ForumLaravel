<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function topic(){
        return $this -> hasOne(Topic::class, 'id');
    }
    public function comments(){
        return $this -> belongsTo(User::class);
    }

    public function rates(){
        return $this -> hasMany(Post::class);
    }
}
