<?php

namespace Database\Seeders;

use App\Models\Mine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $location = ['jakarta', 'kalimantan', 'sulawesi', 'papua', 'aceh', 'ntt'];

        // looping for insert data
        foreach ($location as $l) {
            Mine::create([
                'location' => $l,
            ]);
        }
    }
}
