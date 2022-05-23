<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //$fillableに設定してある値[カラム]を保存する
    protected $fillable = [
        'user_id',
        'post',
        'username'

    ];
    //Userモデルと1対多のリレーション
    public function user(){
        return  $this->belongsTo('App\User');
    }


    public function follows(){
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }
    // フォロワー→フォロー
    public function followUsers(){
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }
}