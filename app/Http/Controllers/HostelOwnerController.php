<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelOwnerController extends Controller
{
    //
    public function rooms()
{
    // Fetch all rooms along with their associated hostel information
    $ownerId = Auth::id();

    // Fetch rooms that belong to hostels owned by this owner
    $rooms = Room::whereHas('hostel', function ($query) use ($ownerId) {
        $query->where('owner_id', $ownerId);
    })->get();

    return view('owner.rooms', compact('rooms'));
}

public function createroom()
{
    $facilities=Facility::all();
    return view('owner.rooms.create',compact('facilities'));
}

public function storeroom(Request $request)
{
    $ownerId=Auth::id();
    $hostel_id = Hostel::where('owner_id', $ownerId)->value('id');

    $validated = $request->validate([
        'room_type'   => 'required|string|max:255',
        'price'       => 'required|integer|min:0',
        'available'   => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'facilities'  => 'nullable|array', // Add validation for facilities
        'facilities.*' => 'exists:facilities,id', // Ensure each facility ID exists
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('rooms', 'public');
        $image = 'storage/' . $imagePath;
    } else {
        $image = 'images/hostels/room.png'; // <-- You can replace with your default room image path
    }
    // Create the room
    $room = Room::create([
        'room_type'   => $validated['room_type'],
        'price'       => $validated['price'],
        'available'   => $validated['available'],
        'description' => $validated['description'],
        'image'       => $image, // Handle image being optional
        'hostel_id'   => $hostel_id, // Assuming hostel_id is being passed from the form
    ]);

    // Attach the selected facilities to the room (if any)
    if (!empty($validated['facilities'])) {
        $room->facilities()->sync($validated['facilities']);
    }

    return redirect('/owner/rooms')->with('success', 'Room added successfully.');
}


public function toggleAvailable($id)
{
    $room = Room::findOrFail($id);
    $room->available = $room->available  ? 0 : 1; // Toggle Status
    $room->save();

    return redirect()->back()->with('success', 'Room availability updated successfully!');
}
public function dashboard()
{
    $hostelsCount = Hostel::where('owner_id', Auth::id())->count();
    $roomsCount = Room::whereHas('hostel', function ($query) {
        $query->where('owner_id', Auth::id());
    })->count();
    return view('owner.dashboard', compact('hostelsCount', 'roomsCount'));
}
}
