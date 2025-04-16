<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelController extends Controller
{
    //
    public function index()
    {
        $hostels = Hostel::paginate(10); // Adjust the pagination count as needed
        return view('hostels.index', compact('hostels'));
    }

    // Handle hostel search functionality
    public function search(Request $request)
    {
        $search = $request->input('search');
        
        // Check if the search keyword exists and query accordingly
        $hostels = Hostel::where('name', 'like', "%{$search}%")
                          ->orWhere('location', 'like', "%{$search}%")
                          ->paginate(10); // Pagination for search results
                          
        return view('hostels.index', compact('hostels', 'search'));
    }

    public function show($id)
    {
    // Fetch the hostel by ID with its rooms and associated facilities
    $hostel = Hostel::with('rooms.facilities')->findOrFail($id);

    return view('hostels.show', compact('hostel'));
    }

    public function create()
    {
        return view('hostels.register');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'pan_no' => 'required|string|unique:hostels,pan_no',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $hostel = new Hostel();
        $hostel->name = $request->name;
        $hostel->owner_name=$request->owner_name;
        $hostel->location = $request->location;
        $hostel->description = $request->description;
        $hostel->pan_no = $request->pan_no;
        $hostel->owner_id = Auth::id(); // Assign logged-in user as owner
        // $hostel->owner_id=1;
        $hostel->is_approved = 0; // Pending admin approval
        $hostel->status=0;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hostels', 'public');
            $hostel->image = 'storage/' . $imagePath;
        } else {
            $hostel->image = 'images/hostels/sample.png'; // Default image
        }

        $hostel->save();

        return redirect()->route('hostels.create')->with('success', 'Your hostel has been submitted for approval.');



    }




}
