<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','popular']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post=Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => $request->user()->id,
        ]);
        if($request->hasFile('image')){
            $path=$request->file('image')->store("posts");

            $image=new Image([ 'path' => $path ]);
            $post->image()->save($image);
        }


        // Send mail to admin and the owner

        return redirect()->route("home")->withSuccess("Post added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize("update",$post);

        if($request->hasFile("image")){

            $path=$request->file("image")->store("posts");

            if ($post->image) {

                Storage::delete($post->image->path);
                $post->image->path=$path;
                $post->image->save();
            }
            else{

                $img=new Image(["path" => $path]);

                $post->image()->save($img);
            }
        }
        $post->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back()->withSuccess("Post updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize("delete",$post);

        $post->delete();

        return redirect()->back()->withSuccess("Post deleted!");
    }

    /**
     * Popular posts
     */
    public function popular(){
        $popularPosts=Post::popularPosts()->take(10)->get();
        return view("posts.popular",compact("popularPosts"));
    }
}
