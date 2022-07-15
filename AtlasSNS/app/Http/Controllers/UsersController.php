<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//ストレージファザード使用できるようになる
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
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

    public function otherProfile($id){
        $posts = Post::with('user')->where('user_id',$id)->latest()->get();
        $user = User::find($id);

        return view('users.other_profile', compact('posts','user'));
    }
   //プロフィール更新
    public function updateProfile(Request $request)
    {
        $validator = $request->validate([
            'username'  => 'required|min:2|max:12',
            'mail' => ['required','min:5','max:40','email', Rule::unique('users')->ignore(Auth::id())],
            'bio' => 'max:150',
            'images' => 'image',
        ]);

            $users = Auth::user();
            $users->username = $request->username;
            $users->mail = $request->mail;
            $users->bio = $request->bio;

        if ($request->password) {
            $request->validate([
                'password' => 'min:8|max:20|confirmed|alpha_num',
                'password_confirmation' => 'min:8|max:20|alpha_num',
            ]);
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