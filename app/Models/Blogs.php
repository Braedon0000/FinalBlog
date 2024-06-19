<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function getRouteKeyName(){
        return 'uuid';
    }
    public function comments(){
         return $this->hasMany(Comment::class,'blogs_id','id');
        // return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
