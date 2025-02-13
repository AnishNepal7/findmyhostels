<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
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
        $hostel = Hostel::findOrFail($id);
        $hostel->is_approved = 1;
        $hostel->save();

        return redirect()->back()->with('success', 'Hostel approved successfully!');
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

}
