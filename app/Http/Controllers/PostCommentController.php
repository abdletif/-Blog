<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\PostCommentRequest;
use App\Models\Post;

class PostCommentController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->only(["store","update"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view("posts.index",[
            'comments' => $post->comments()-with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCommentRequest $request,Post $post)
    {
        // dd($request->all());
        $post->comments()->create([
            'title'   => $request->title,
            'user_id' => $request->user()->id
        ]);

        return redirect()->back()->withSuccess("Commentaire ajouter !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(PostCommentRequest $request, Comment $comment)
    {
        $comment->update([
            'title'   => $request->title,
        ]);

        return redirect()->back()->withSuccess("Commentaire modifier !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->withSuccess("Commentaire supprimé !");
    }
}
