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
        $user = \Auth::user();
        return view('users.profile', compact('user'));
    }

   //プロフィール更新
    public function updateProfile(Request $request)
    {
        //ログインユーザー情報 $user = new User();を取得する
        $user = Auth::user();
        $user->username = $request->username;
        $user->mail = $request->mail;
        $user->password = bcrypt($request->password);

        $user->bio = $request->bio;
        $user->images = $request->images;

        if(request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            $file = request()->file('image')->move('storage/images',$name);
            $user->image=$name;
        }

        $user->save();
        return view('users.profile', compact('user'))->with('newProfile','更新完了しました');

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