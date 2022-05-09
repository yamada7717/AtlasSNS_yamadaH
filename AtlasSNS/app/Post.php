<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //$fillableに設定してある値を保存する
     protected $fillable = [
        'user_id',
        'name',
    ];
}