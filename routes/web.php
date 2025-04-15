<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\HostelOwnerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes (Unauthenticated Users)
// Route::get('/', function () {
//     return view('app.home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'store']);

// Hostel Search and Display (Public or Authenticated Users)
Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
Route::get('/hostels/search', [HostelController::class, 'search'])->name('hostels.search');
Route::get('/hostels/{id}', [HostelController::class, 'show'])->name('hostels.show');

// Authenticated User Routes (Role: user)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/hostels/register', [HostelController::class, 'create'])->name('hostels.create');
    Route::post('/hostels/register', [HostelController::class, 'store'])->name('hostels.store');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

});

// Admin Routes (Role: admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/hostels/pending', [AdminController::class, 'pendinghostels'])->name('admin.pendinghostels');
    Route::get('/admin/hostels', [AdminController::class, 'hostels'])->name('admin.hostels');
    Route::post('/hostels/{id}/approve', [AdminController::class, 'approveHostel'])->name('hostels.approve');
    Route::post('/hostels/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('hostels.toggleStatus');
    Route::resource('users', UserController::class);
});

// Hostel Owner Routes (Role: hostel_owner or admin)
Route::middleware(['auth', 'role:hostel_owner,admin'])->group(function () {
    Route::get('/owner/rooms', [HostelOwnerController::class, 'rooms'])->name('owner.rooms');
    Route::get('/owner/createroom', [HostelOwnerController::class, 'createroom'])->name('owner.createRoom');
    Route::post('/owner/storeroom', [HostelOwnerController::class, 'storeroom'])->name('owner.storeRoom');
    Route::get('/owner/editroom/{id}', [HostelOwnerController::class, 'editroom'])->name('owner.editRoom');
    Route::post('/owner/deleteroom/{id}', [HostelOwnerController::class, 'deleteroom'])->name('owner.deleteRoom');
    Route::post('/room/{id}/toggle-available', [HostelOwnerController::class, 'toggleAvailable'])->name('owner.toggleAvailable');
    Route::get('/owner/dashboard', [HostelOwnerController::class, 'dashboard'])->name('owner.dashboard');
});

// Shared Routes (Authenticated Users with Specific Roles)
Route::middleware(['auth'])->group(function () {
    Route::get('/hostels/{hostel}/edit', [HostelController::class, 'edit'])->name('hostels.edit');
    Route::put('/hostels/{hostel}', [HostelController::class, 'update'])->name('hostels.update');
    Route::delete('/hostels/{hostel}', [HostelController::class, 'destroy'])->name('hostels.destroy');
});