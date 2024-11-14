<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fungsi untuk mendapatkan tanggal acak antara 3 hingga 7 hari setelah start date
        function randomDate($startDate, $endDate)
        {
            // Mengonversi tanggal awal dan akhir ke timestamp
            $startTimestamp = strtotime($startDate);
            $endTimestamp = strtotime($endDate);

            // Mendapatkan timestamp acak di antara tanggal awal dan akhir
            $randomTimestamp = rand($startTimestamp, $endTimestamp);

            // Mengonversi timestamp acak ke format tanggal
            return date("Y-m-d", $randomTimestamp);
        }

        $adminCenter = Str::uuid();
        User::create([
            'id' => $adminCenter,
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'admin_center_name' => 'Admin Center',
        ]);

        $usernameAdminField = ['adminfield1', 'adminfield2', 'adminfield3', 'adminfield4', 'adminfield5', 'adminfield6'];
        $passwordAdminField = ['adminfield123', 'adminfield123', 'adminfield123', 'adminfield123', 'adminfield123', 'adminfield123'];
        $nameAdminField = ['Admin Field 1', 'Admin Field 2', 'Admin Field 3', 'Admin Field 4', 'Admin Field 5', 'Admin Field 6'];
        $mine = [1, 2, 3, 4, 5, 6];
        $part=0;
        foreach (range(0, 5) as $number) {
            $currentMineId=1;


            $adminField = Str::uuid();
            $adminFieldData = [
                'id_admin' => $adminField,
                'username' => $usernameAdminField[$number],
                'password' => bcrypt($passwordAdminField[$number]),
                'admin_field_name' => $nameAdminField[$number],
                'mine_id' => $mine[$number],
            ];
            Admin::create($adminFieldData);
            foreach (range(0, 150) as $i) {
                $currentMineId ++;
                $part++;
                if ($currentMineId > 6) {
                    $currentMineId = 1;
                }
                $startDate = '2024-7-01';
                $endDate = '2024-10-31';
                 // Tanggal mulai penggunaan
                $fixStartDate=randomDate($startDate, $endDate);
                $fixEndDate=randomDate($fixStartDate, $endDate);
                while($fixStartDate==$endDate){
                    $fixStartDate=randomDate($fixStartDate, $endDate);
                }
                while($fixEndDate<=$fixStartDate){
                    $fixEndDate=randomDate($fixStartDate, $endDate);
                }
                
                $status=['pending', 'approved', 'rejected','in use','done'];
                
                $booking = [
                    'vehicle_id' => $part,
                    'driver_id' => $part,
                    'start_usage_date' => $fixStartDate,

                    'end_usage_date' => $fixEndDate,
                    'created_by' => $adminField,
                    'admin_center_id' => $adminCenter,
                    'status' => $status[array_rand($status)],
                ];

    
                // Simpan booking data ke database (gunakan model Booking)
                
                // Simpan booking data ke database (gunakan model Booking)
                \App\Models\Booking::create($booking);
                $history = [
                    'booking_id' => $part,
                    'fuel_used' => rand(1, 100),
                    'distance' => rand(1, 100),     
                ];
                \App\Models\HistoryVehicle::create($history);
                
                
            }
        }

        
    }
}
