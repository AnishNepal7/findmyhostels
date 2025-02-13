<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $popularHostels = Hostel::where('is_approved', 1)
        ->where('status', 1)
        ->take(6)
        ->get(); // Fetching top 6 hostels

return view('app.home', compact('popularHostels'));
    }

    public function about()
    {
        return view('app.about');

    }
    public function services()
    {
        
        return view('app.services');
    }
}
