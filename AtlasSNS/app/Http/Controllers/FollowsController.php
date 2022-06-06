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
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
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