<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\User::class,15)->create();
        // factory(App\Task::class,2)->create();
        factory(App\Comment::class,200)->create();
    }
}
