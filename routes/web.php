<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use App\Models\Food;
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

Route::get('/food', function(){
    $food = Food::all();
    return view('food', ['food' => $food]);
})->name('food');

Route::post('/food', [FoodController::class, 'create'])->name('food.create');


//////// pre chechpoint1
Route::get('/new_index', function(){
    return view('new_index');
})->name('new_index');

Route::get('/new_choosing_firm', function(){
    return view('new_choosing_firm');
})->name('new_choosing_firm');

Route::get('/new_choosing_city', function(){
    return view('new_choosing_city');
})->name('new_choosing_city');

Route::get('/new_city_zilina', function(){
    return view('new_city_zilina');
})->name('new_city_zilina');

Route::get('/new_for_firms', function(){
    return view('new_for_firms');
})->name('new_for_firms');

Route::get('/new_information', function(){
    return view('new_information');
})->name('new_information');

////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
