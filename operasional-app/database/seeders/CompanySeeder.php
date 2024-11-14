<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $companies = [
            'Rekaf Mining Company',
            'Batu Bara Rent Company',
            'Bumi Rent Company',
            'Maju Mundur Rent Company',
            'Maju Jaya Rent Company',
            'Tirta Rent Company',
            'Sumber Daya Rent Company',
            'Energi Rent Company',
            'Alam Rent Company',
            'Sejahtera Rent Company'
        ];

        foreach ($companies as $c) {
            Company::create([
                'company_name' => $c,
                'company_address' => $faker->address,
                'company_contact' => $faker->phoneNumber,
            ]);
        }
    }
}
