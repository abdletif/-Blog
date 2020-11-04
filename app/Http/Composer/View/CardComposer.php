<?php

namespace App\Http\Composer\View;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class CardComposer{

    public function compose(View $view)
    {
        $mostPostsCommented=Cache::remember('mostPostsCommented', now()->addHour(), function () {
           return Post::withCount("comments")->orderBy("comments_count","DESC")->take(5)->get();
        });
        $ActiveUsers=Cache::remember('ActiveUsers', now()->addHour(), function () {
           return User::activeUsers()->take(5)->get();
       });
        $mostUserActiveInLastMonth=Cache::remember('mostUserActiveInLastMonth', now()->addHour(), function () {
            return User::mostUserActiveInLastMonth()->take(5)->get();
        });

       $view->with([
           'mostPostsCommented'        => $mostPostsCommented,
           'ActiveUsers'               => $ActiveUsers,
           'mostUserActiveInLastMonth' => $mostUserActiveInLastMonth,
       ]);
    }
}
