<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//ストレージファザード使用できるようになる
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\ImplicitRule;
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
        $validator = Validator::make($request->all(),[
            'username'  => 'required|min:2|max:12',
            'mail' => ['required|min:5|max:40|mail', Rule::unique('users')->ignore(Auth::id())],
            'password' => 'min:8|max:20|confirmed|alpha_num',
            'password_confirmation' => 'min:8|max:20|alpha_num',
            'bio' => 'max:150',
            'images' => 'image||alpha_num',
        ]);


        $users = Auth::user();
        $validator->validate();
        $users->username = $request->username;
        $users->mail = $request->mail;
        $users->bio = $request->bio;

        //パスワード確認
        if($request->password){
            $users->password = bcrypt($request->password);

        }

        if($request->images){
            $original = $request->file('images')->getClientOriginalName();
            $file = $request->file('images')->move('storage/images' , $original);
            $users->images = $original;
        }

        $users->save();
        return redirect('/top')->with('newProfile','更新完了しました');

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