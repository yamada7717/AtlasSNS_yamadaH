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
    public function index(Request $request)
    {

    }

    public function searchList(Request $request){
        $keyword = $request->input('keyword');

        $query = User::query();
        if (!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }
        $search = $query->get();
        return view('users.search',['search'=>$search,'keyword'=>$keyword]);
    }

    public function profile(){
        return view('users.profile');
    }

    public function search(){
        $users = User::get();
        return view('users.search', compact('users'));
    }

        public function show(User $user)
    {
        $user = User::find($user->id); //idが、リクエストされた$userのidと一致するuserを取得
        $posts = Post::where('user_id', $user->id) //$userによる投稿を取得
            ->orderBy('created_at', 'desc'); // 投稿作成日が新しい順に並べる
        return view('users.search',compact('posts'));
    }

}