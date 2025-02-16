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
    $rooms = Room::all();
    return view('owner.rooms', compact('rooms'));
}

public function createroom()
{
    $facilities=Facility::all();
    return view('owner.rooms.create',compact('facilities'));
}

public function toggleAvailable($id)
{
    $room = Room::findOrFail($id);
    $room->available = $room->available == 1 ? 0 : 1; // Toggle Status
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
