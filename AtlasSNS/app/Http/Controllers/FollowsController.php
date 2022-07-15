<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;
use App\Post;

class FollowsController extends Controller
{
    public function followList(){
        $posts = Post::get();
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        //フォロー画像一覧の為user,
        $users = User::get();
        return view('follows.followList',compact('posts','users'));
    }

    public function followerList(){
        $posts = Post::get();
        $followed_id = Auth::user()->follower()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
        $users = User::whereIn('id',$followed_id)->get();
        return view('follows.followerList',compact('posts','users'));
    }

     // フォロー
    public function follow(Request $request){
        $id = $request->input('user_id');
        \DB::table('follows')->insert([
            'following_id' => Auth::user()->id,
            'followed_id'  => $id
        ]);

        return redirect('/search');
    }

    public function unFollow(Request $request)
    {
        $id = $request->input('user_id');
        Follow::where('following_id', Auth::user()->id)->where('followed_id',$id)->delete();

        return redirect('/search');
    }

}