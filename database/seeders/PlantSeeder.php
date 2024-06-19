<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plants = [];

        for ($i=0; $i < 10; $i++) {
            array_push($plants, [
                // 'user_id',
                // 'plant_id',
                // 'is_default',
                'name' => fake()->name(),
                'image' => fake()->name(),
                'watering' => fake()->numberBetween(0, 100),
                'temperature' => fake()->numberBetween(0, 100),
                'humidity' => fake()->numberBetween(0, 100),
                'soil_Humidity' => fake()->numberBetween(0, 100)
            ]);
        }

        Plant::insert($plants);
    }
}
