<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Follow;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function follow(User $user) {
        $follow = Follow::create([
            'following_id' => \Auth::user()->id,
            'followed_id' => $user->id,
        ]);
        $followCount = count(Follow::where('followed_id', $user->id)->get());

    }

    public function unfollow(User $user) {
        $follow = Follow::where('following_id', \Auth::user()->id)->where('followed_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('followed_id', $user->id)->get());

    }
}