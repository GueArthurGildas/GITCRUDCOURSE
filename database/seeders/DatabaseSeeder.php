<?php

namespace Database\Seeders;
use App\Models\User;
use  App\Models\Task;

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
        User::factory(10)->create();
        Task::factory(8)->create();

    }
}
