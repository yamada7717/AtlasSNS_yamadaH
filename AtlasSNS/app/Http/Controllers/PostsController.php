<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Follow;


class PostsController extends Controller
{
    public function index(){
        $posts = Post::get();
     // フォローしているユーザーのidを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');

    // フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id', $following_id,)->orWhere('user_id', Auth::user()->id)->get();

        return view('posts.index', compact('posts'));
    }

    //新規投稿
    public function create(Request $request){
        $post = new Post();
        $validator = $request->validate([
            'post_tweet' => 'required|string|min:2|max:200',
        ]);
        //ログインユーザー情報を取得する
        $post->user_id = Auth::user()->id;
        //フォームのnameをpostカラムに保存
        $post->post = $request->post_tweet;
        $post->save();
        return redirect('/top')->with('message','投稿完了');
    }

    //投稿更新
    public function update(Request $request)
    {

        $id = $request->input('id');
        $upPost =  $request->validate(['upPost' => 'string|max:150']);
        $upPost = $request->input('upPost');
        \DB::table('posts')->where('id', $id)->update(['post' => $upPost]);
        return redirect('/top');

    }

    //投稿削除
    public function delete($id)
    {
        \DB::table('posts')->where('id', $id)->delete();

        return redirect('/top');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
}