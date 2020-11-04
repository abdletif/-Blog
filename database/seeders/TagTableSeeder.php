<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=collect(['Sport','Technology','Science','Art','Travel','Human','Business']);
        $tags->each(function($tag){
            $myTag=new Tag();
            $myTag->name=$tag;
            $myTag->save();
        });
    }
}
