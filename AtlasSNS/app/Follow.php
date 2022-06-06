<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        //フォローする、フォローされるidを下記カラムに登録する
        'following_id',
        'followed_id',
    ];

     public function users(){
    return  $this->belongsToMany('App\User');
    }
     public function posts(){
    return  $this->belongsToMany('App\User');
    }
}