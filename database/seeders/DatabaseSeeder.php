<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TagPostSeeder;
use Database\Seeders\TagTableSeeder;
use Database\Seeders\PostTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\CommentTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        if ($this->command->confirm("Do You want to refresh all migration ?")) {

            $this->command->call("migrate:refresh");
            $this->command->info("All migrations are refreshed !");
            return;
        }

        $this->call([
            UserTableSeeder::class,
            PostTableSeeder::class,
            CommentTableSeeder::class,
            TagTableSeeder::class,
            TagPostSeeder::class
        ]);
    }
}
