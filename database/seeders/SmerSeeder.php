<?php

namespace Database\Seeders;

use App\Models\Smer;
use Illuminate\Database\Seeder;

class SmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smer::create([
            'nazivSmera' => 'Informacioni sistemi i tehnologije',
            'fakultetID' => '1'
        ]);

        Smer::create([
            'nazivSmera' => 'Menadžment',
            'fakultetID' => '1'
        ]);

        Smer::create([
            'nazivSmera' => 'Informatika',
            'fakultetID' => '2'
        ]);

        Smer::create([
            'nazivSmera' => 'Matematika',
            'fakultetID' => '2'
        ]);

        Smer::create([
            'nazivSmera' => 'Elektrotehnika',
            'fakultetID' => '3'
        ]);

        Smer::create([
            'nazivSmera' => 'Računarstvo i automatika',
            'fakultetID' => '4'
        ]);
    }
}
