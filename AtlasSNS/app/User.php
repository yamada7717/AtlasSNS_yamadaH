<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // username, mail, passwordカラムにデータの挿入を許可する
    protected $fillable = [
        'username',
        'mail',
        'password',
        'bio',
        'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Postモデルとリレーション
    public function posts() //関数名は複数形がベスト
    {
    return $this->hasMany('App\Post');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }
    // フォロワー→フォロー
    public function follower()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

   // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->follows()->where('following_id', $user_id)->first(['follows.id']);
    }

}