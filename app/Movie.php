<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    protected $fillable = [
        'title','genre','description','rating','photo'
    ];
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public  function  comment(){
        return $this->hasMany('App\Movie');  //one to many
    }
    public  function  bookmark(){
        return $this->hasMany('App\Bookmark');  //one to many
    }
}
