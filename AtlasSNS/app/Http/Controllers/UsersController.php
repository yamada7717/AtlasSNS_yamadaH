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
        return view('users.profile');
    }


    public function index(Request $request)
    {

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