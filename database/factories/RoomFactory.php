<?php

namespace Database\Factories;

use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Room::class;

    public function definition()
    {
        return [
            'hostel_id' => Hostel::factory(),  // Automatically creates a hostel
            'room_type' => $this->faker->word,
            'price' => $this->faker->numberBetween(1000, 5000),
            'available' => $this->faker->boolean(70),  // 70% chance to be available
            'description' => $this->faker->text,
            'image'=>'images/hostels/room.png'
        ];
    }
}
