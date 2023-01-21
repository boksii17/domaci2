<?php

namespace Database\Seeders;

use App\Models\Fakultet;
use Illuminate\Database\Seeder;

class FakultetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultet::create([
            'nazivFakulteta' => 'FON',
            'grad' => 'Beograd'
        ]);

        Fakultet::create([
            'nazivFakulteta' => 'MATF',
            'grad' => 'Beograd'
        ]);

        Fakultet::create([
            'nazivFakulteta' => 'ELFAK',
            'grad' => 'Niš'
        ]);

        Fakultet::create([
            'nazivFakulteta' => 'FTN',
            'grad' => 'Novi Sad'
        ]);

        
    }
}
