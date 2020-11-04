<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts=Post::all();
        $users=User::all();

        if($posts->count()==0){
            $this->command->info("You should to create some posts!");
            return;
        }
        $nbrComments=$this->command->ask("How many comments you want to generate ?",10);

        Comment::factory($nbrComments)->make()->each(function($comment) use($users,$posts){
            $comment->post_id=$posts->random()->id;
            $comment->user_id=$users->random()->id;
            $comment->save();
        });
    }
}
