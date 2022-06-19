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

    public function search(){
        $users = User::get();
        return view('users.search', compact('users'));
    }

    public function profile(){
        $users = Auth::user();
        return view('users.profile', compact('users'));
    }

   //プロフィール更新
    public function updateProfile(Request $request)
    {
        $users = Auth::user();
        $users->username = $request->username;
        $users->mail = $request->mail;
        $users->password = bcrypt($request->password);
        $users->bio = $request->bio;

        if($request->images){
            $original = request()->file('images')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            $file = $request->file('images')->move('storage/images' , $name);
            $users->images=$name;
        }

        $users->save();
        return view('users.profile', compact('users'))->with('newProfile','更新完了しました');

    }
//ユーザー検索
    public function searchList(Request $request){
        $keyword = $request->input('keyword');

        $query = User::query();
        if (!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }
        $users = $query->get();
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }


}