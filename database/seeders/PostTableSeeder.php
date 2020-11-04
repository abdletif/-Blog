<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all();
        if($users->count()==0){
            $this->command->info("You should to create some users");
            return;
        }
        $nbrPosts=$this->command->ask("How many posts you want to generate ?",10);

        Post::factory($nbrPosts)->make()->each(function($post) use($users){
            $post->user_id=$users->random()->id;
            $post->save();
        });
    }
}
