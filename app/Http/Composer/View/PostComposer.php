<?php


namespace App\Http\Composer\View;

use App\Models\Post;
use Illuminate\View\View;

class PostComposer{

    public function compose(View $view){

        $posts=Post::popularPosts()->paginate(6);

        $view->with([
            'posts' => $posts
        ]);

    }
}
