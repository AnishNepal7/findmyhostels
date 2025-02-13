<?php

namespace Database\Factories;

use App\Models\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facility>
 */
class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Facility::class;

    public function definition()
    {
        // Array of predefined facilities
        $facilities = [
            'Wi-Fi',
            'Bathroom',
            'Washing Machine',
            'Breakfast',
            'Swimming Pool',
            'Gym',
            'Air Conditioning',
            'Parking',
            'TV',
            'Fridge',
        ];

        return [
            'name' => $this->faker->randomElement($facilities), // Randomly pick a facility from the list
        ];
    }
}
