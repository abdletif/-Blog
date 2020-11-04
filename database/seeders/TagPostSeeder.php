<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;

class TagPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags_count=Tag::count();

        Post::all()->each(function($post) use($tags_count) {

            $take=random_int(1,$tags_count);

            $tagsId=Tag::inRandomOrder()->take($take)->get()->pluck("id");

            $post->tags()->sync($tagsId);

        });
    }
}
