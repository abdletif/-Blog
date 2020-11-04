<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbrUsers=$this->command->ask("How many users you want to generate ?",20);
        User::factory($nbrUsers)->create();
    }
}
