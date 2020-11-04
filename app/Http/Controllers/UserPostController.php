<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    public function __construct(){
        $this->middleware(["checkUser","auth"])->only(["posts"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view("users.index",[
            'user' => $user
        ]);
    }

    /**
     * User posts
     */
    public function posts(User $user){

        return view("users.posts",[
            'posts' => $user->posts()->orderBy("created_at","DESC")->get()
        ]);
    }
}
