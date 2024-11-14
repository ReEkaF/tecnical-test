<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $mineId = 1;

    public function definition(): array
    {
        // Menetapkan mine_id secara berurutan, mulai ulang setelah mencapai batas tertentu
        $currentMineId = $this->mineId;
        $this->mineId = ($this->mineId >= 6) ? 1 : $this->mineId + 1;
    
        return [
            'vehicle_name' => $this->faker->company . ' Truck',
            'vehicle_type' => $this->faker->randomElement(['angkutan', 'barang']),
            'vehicle_license' => strtoupper($this->faker->bothify('??####')),
            'company_id' => $this->faker->numberBetween(1, 10),
            'fuel_type' => $this->faker->randomElement(['bensin', 'solar']),
            'fuel_capacity' => $this->faker->numberBetween(40, 100),
            'mine_id' => $currentMineId,
        ];
    }
    
}
