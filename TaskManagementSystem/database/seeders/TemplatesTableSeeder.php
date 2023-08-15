<?php

namespace Database\Seeders;

use App\Models\Template;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Template::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'due_date' => Carbon::now()->addDays($faker->numberBetween(1, 30)),
            ]);
        }
    }
}
