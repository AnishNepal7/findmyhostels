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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home',[HomeController::class,'index']);
// Route::get('/about', function () {
//     return view('app.about');
// })->name('about');
Route::get('/about',[HomeController::class,'about']);
Route::get('/services',[HomeController::class,'services']);


Route::get('login',[AuthController::class,'login']);
Route::get('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'authenticate']);
Route::post('register',[AuthController::class,'store']);

//section for logged in users
Route::get('hostels/register', [HostelController::class, 'create'])->name('hostels.create');
Route::post('hostels/register', [HostelController::class, 'store'])->name('hostels.store');
Route::get('hostels', [HostelController::class, 'index'])->name('hostels.index1');


// for displaying hostels
// routes/web.php

//section for normal users
Route::get('hostels', [HostelController::class, 'index'])->name('hostels.index');
Route::get('hostels/search', [HostelController::class, 'search'])->name('hostels.search');
Route::get('hostels/{id}', [HostelController::class, 'show'])->name('hostels.show');


//section for admin

Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/hostels/pending',[AdminController::class,'pendinghostels']);
Route::get('/admin/hostels',[AdminController::class,'hostels']);


Route::get('hostels/{hostel}/edit', [HostelController::class, 'edit'])->name('hostels.edit');
Route::put('hostels/{hostel}', [HostelController::class, 'update'])->name('hostels.update');
Route::delete('hostels/{hostel}', [HostelController::class, 'destroy'])->name('hostels.destroy');
Route::post('/hostels/{id}/approve', [AdminController::class, 'approveHostel'])->name('hostels.approve');
Route::get('admin/hostels/{hostel}', [HostelController::class, 'show'])->name('hostels.adminshow');
Route::post('/hostels/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('hostels.toggleStatus');

Route::resource('users',UserController::class);

//section for hostel owner
Route::get('owner/rooms', [HostelOwnerController::class, 'rooms'])->name('owner.rooms');
Route::get('owner/createroom',[HostelOwnerController::class,'createroom'])->name('owner.createRoom');
Route::get('owner/storeroom',[HostelOwnerController::class,'storeroom'])->name('owner.storeRoom');

Route::post('owner/editroom/{id}',[HostelOwnerController::class,'createroom'])->name('owner.editRoom');
Route::post('owner/deleteroom/{id}',[HostelOwnerController::class,'createroom'])->name('owner.deleteRoom');
Route::post('/room/{id}/toggle-available', [HostelOwnerController::class, 'toggleAvailable'])->name('owner.toggleAvailable');


