<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function pendinghostels()
    {
        $pendingHostels = Hostel::where('is_approved', 0)->get();
        return view('admin.pendinghostels', compact('pendingHostels'));
    }

    public function approveHostel($id)
    {
        // Find the hostel by ID
        $hostel = Hostel::findOrFail($id);
    
        // Approve the hostel
        $hostel->is_approved = 1;
        $hostel->save();
    
        // Get the owner (user) of the hostel using the relationship
        $owner = $hostel->owner;
    
        // Check if the owner exists and assign the 'hostel_owner' role
        if ($owner) {
            $hostelOwnerRole = Role::where('name', 'hostel_owner')->first();
    
            // Attach the 'hostel_owner' role if not already assigned
            if ($hostelOwnerRole && !$owner->roles->contains($hostelOwnerRole)) {
                $owner->roles()->attach($hostelOwnerRole);
            }
        }
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Hostel approved successfully and owner role updated!');
    }
    


    public function hostels()
    {
        $hostels = Hostel::all();
        return view('admin.hostels', compact('hostels'));
    }
    public function toggleStatus($id)
{
    $hostel = Hostel::findOrFail($id);
    $hostel->status = $hostel->status == 1 ? 0 : 1; // Toggle Status
    $hostel->save();

    return redirect()->back()->with('success', 'Hostel status updated successfully!');
}
public function dashboard()
{
    $pendingHostelsCount = Hostel::where('is_approved', 0)->count();
    $usersCount = User::count();
    return view('admin.dashboard', compact('pendingHostelsCount', 'usersCount'));
}

}
