<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    protected $mineId = 1; // Memulai mine_id dari 1

    public function definition(): array
    {
        // Menetapkan mine_id secara berurutan, mulai ulang setelah mencapai batas tertentu
        $currentMineId = $this->mineId;
        $this->mineId = ($this->mineId >= 6) ? 1 : $this->mineId + 1;

        return [
            'driver_name' => $this->faker->name(),
            'driver_address' => $this->faker->address(),
            'driver_contact' => $this->faker->phoneNumber(),
            'mine_id' => $currentMineId, // mine_id yang diurutkan
        ];
    }
}
