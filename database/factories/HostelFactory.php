<?php

namespace Database\Factories;

use App\Models\Hostel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hostel>
 */
class HostelFactory extends Factory
{
    protected $model = Hostel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->address,
            'description' => $this->faker->text,
            'status' => $this->faker->boolean(80),  // 80% chance to be available
            'owner_name' => $this->faker->name,
            'is_approved' => $this->faker->boolean(90),  // 90% chance to be approved
            'pan_no' => $this->faker->optional()->word,
            'image' => 'images/hostels/sample.jpg',
            'owner_id' => 1, // Default to null; will be updated in the seeder
        ];
    }
}