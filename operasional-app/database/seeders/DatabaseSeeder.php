<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Approval;
use App\Models\Approver;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Driver;
use App\Models\Mine;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MineSeeder::class,
        ]);
        $this->call([
            DriverSeeder::class,
        ]);
        $this->call([
            CompanySeeder::class,
        ]);
        $this->call([
            VehicleSeeder::class,
        ]);
        $this->call([
            BookingSeeder::class,
        ]);

        
    }
}
