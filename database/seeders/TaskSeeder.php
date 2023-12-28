<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // User::factory()
        //     ->count(50)
        //     ->create();
        Task::factory()
            ->count(3)
            ->create();
        //
        // $faker = Faker::create();

        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('tasks')->insert([
        //         'titel' => $faker->sentence(5),
        //         'is_done' => $faker->randomElement([0, 1]),
        //     ]);
        // }
    }
}
