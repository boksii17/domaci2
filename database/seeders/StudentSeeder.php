<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            Student::create([
                'ime' => $faker->firstName(),
                'prezime' => $faker->lastName(),
                'brojIndeksa' => $faker->numerify('2022/0###'),
                'smerID' => $faker->numberBetween(1,6)
            ]);
        }
    }
}
