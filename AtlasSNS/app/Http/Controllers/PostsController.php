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
    }

    //新規登録
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

    //投稿編集画面
    public function edit($id)
    {
        //
    }

    // 投稿編集処理
    public function update(Request $request, $id)
    {
        //
    }

    //投稿削除
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

    //Postモデル経由でpostsテーブルのレコードを取得
    public function show(){
        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}