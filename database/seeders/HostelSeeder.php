<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 hostels
        $hostels = Hostel::factory(10)->create();

        // For each hostel, create rooms and attach facilities
        foreach ($hostels as $hostel) {
            // Create 4 rooms for each hostel
            $rooms = Room::factory(4)->create([
                'hostel_id' => $hostel->id,
            ]);

            // For each room, attach 5 random facilities
            foreach ($rooms as $room) {
                $facilities = Facility::inRandomOrder()->take(5)->pluck('id');
                $room->facilities()->attach($facilities);
            }
        }
    }
}
