<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoryVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $part = 0;
        foreach (range(0, 150) as $i) {
            $part++;



            $status = ['pending', 'approved', 'rejected', 'in use', 'done'];

            $history = [
                'vehicle_id' => $part,
                'driver_id' => $part,
                'fuel_used' => rand(1, 100),
                'distance' => rand(1, 100),
                
            ];

            // Simpan booking data ke database (gunakan model Booking)
            \App\Models\HistoryVehicle::create($history);
        }
    }
}
