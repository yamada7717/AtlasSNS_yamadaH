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
    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follow', 'following_id', 'followed_id');
    }
    // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follow', 'followed_id', 'following_id');
    }
}