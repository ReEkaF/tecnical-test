<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Approval;
use App\Models\Approver;
use App\Models\Booking;
use App\Models\Company;
use App\Models\Driver;
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
        $idUser1 = Str::uuid();
        $idUser2 = Str::uuid();
        $idUser3 = Str::uuid();
        Admin::create([
            'id_admin'=>$idUser1,
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
        Approver::create([
            'id_approver'=>$idUser2,
            'username' => 'supervisor',
            'password' => bcrypt('supervisor123'),
            'jabatan' => 'supervisor',
        ]);
        Approver::create([
            'id_approver'=>$idUser3,
            'username' => 'manager',
            'password' => bcrypt('manager123'),
            'jabatan' => 'manager',
        ]);

        Driver::create([
            'id_driver' => 1,
            'driver_name' => 'John Doe',
            'driver_address' => '456 Maple Street, Citytown',
            'driver_contact' => '987-654-3210',
        ]);
        Company::create([
            'id_company' => 1,
            'company_name' => 'Tech Solutions Inc.',
            'company_address' => '1234 Innovation Drive, Tech City',
            'company_contact' => '123-456-7890',
        ]);
        Vehicle::create([
            'id_vehicle' => 1,
            'vehicle_name' => 'Truck ABC',
            'vehicle_type' => 'barang',
            'vehicle_license' => 'XYZ-1234',
            'company_id' => 1,
            'fuel_type' => 'solar',
            'fuel_capacity' => 120.5,
        ]);
        Booking::create([
            'id_booking' => 1,
            'vehicle_id' => 1,
            'driver_id' => 1,
            'booking_date' => '2024-01-01',
            'start_usage_date' => '2024-01-05',
            'end_usage_date' => '2024-01-10',
        ]);
        Approval::create([
            'id_approval' => 1,
            'booking_id' => 1,
            'approver_id' => $idUser3,
            'approver_level' => 'manager',
            'approval_status' => 'pending',
        ]);
        
    }
}
