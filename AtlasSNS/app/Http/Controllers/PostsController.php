<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;


class PostsController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return view('posts.index', compact('users'));
    }

    public function create(Request $request){
        // $post = $request->input('post_tweet');
        // \DB::table('posts')->insert([
        //     'post' => $post
        // ]);
         $post = new Post();
        $validator = $request->validate([
            'post_tweet' => 'required|string|min:2|max:200',
        ]);
        //ログインユーザーを認識させる
        $post->user_id = Auth::user()->id;
        //フォームのnameをpostカラムに登録
        $post->post = $request->post_tweet;
        $post->save();

        $list = $post->all();
        return redirect('/top', compact('list'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}