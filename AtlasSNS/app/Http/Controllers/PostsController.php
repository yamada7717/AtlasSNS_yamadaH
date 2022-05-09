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
    //ログインした際にusersTBからidとnameを取得
        $users = DB::table('users')->get();
        return view('posts.index', compact('users'));
    }

    public function create(Request $request){
        // $post_tweet = $request->input('post_tweet');
        // \DB::table('posts')->insert([
        //     'post_tweet' => $post_tweet
        // ]);
         $post = new Post();
        $validator = $request->validate([
            'post_tweet' => 'required|string|min:1|max:200',
        ]);
        $post->post_tweet = $request->post_tweet;
        $post->save();
        return redirect('/index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}