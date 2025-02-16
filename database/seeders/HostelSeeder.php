<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\User;
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

        // For each hostel, create a unique owner (user) and assign rooms and facilities
        foreach ($hostels as $hostel) {
            // Create a unique user (owner) for the hostel
            $owner = User::factory()->create([
                'password' => bcrypt('1234'), // Ensure all users have the same password
            ]);

            // Update the hostel's owner_id to link it to the newly created user
            $hostel->update(['owner_id' => $owner->id]);

            // Assign the 'hostel_owner' role to the user if not already assigned
            $hostelOwnerRole = \App\Models\Role::where('name', 'hostel_owner')->first();
            if ($hostelOwnerRole && !$owner->roles->contains($hostelOwnerRole)) {
                $owner->roles()->attach($hostelOwnerRole);
            }

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