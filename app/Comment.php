<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
         'comment','user_id','movie_id'
    ];
    protected $guarded = ['id'];

    public  function  user(){
        return $this->belongsTo('App\User');  //one to many
    }
    public  function  movie(){
        return $this->belongsTo('App\Movie');  //one to many
    }
}
