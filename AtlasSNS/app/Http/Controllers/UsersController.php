<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function index(){
        return view('users.search');
    }

    //indexの引数の$userはメソッドインジェクション依存性の注入
    public function follow(Request $request)
    {
        //Authユーザーの一覧をidで取得
        $all_users = $request->getAllUsers(Auth::user()->id);

        return view('posts.index', [
            'all_users'  => $all_users
        ]);

    }

    public function users(){
        return  $this->hasMany('App\User');
    }

    public function posts(){
    return  $this->hasMany('App\Post');
    }
}