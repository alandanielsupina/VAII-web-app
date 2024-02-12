<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerController;
use App\Models\Company;
use App\Models\Food;
use App\Models\Service;
use App\Models\Worker;
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
    $services = Service::all();
    return view('welcome', ['services' => $services]);
});

Route::get('/food', function(){
    $food = Food::all();
    return view('food', ['food' => $food]);
})->middleware(['auth', 'verified'])->name('food');

Route::post('/food', [FoodController::class, 'create'])->middleware(['auth', 'verified'])->name('food.create');


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

Route::get('/new_for_firms', function(){
    return view('new_for_firms');
})->name('new_for_firms');

Route::get('/new_information', function(){
    return view('new_information');
})->name('new_information');

//// pre checkpoint2
Route::get('/new_all_services', function(){
    //$services = Service::where('city_name','Žilina')->get();
    $services = Service::all();
    return view('new_all_services', ['services' => $services]);
})->name('new_all_services');

Route::get('/new_services/create', [ServiceController::class, 'create'])->middleware(['auth', 'verified'])->name('new_services.create');
//Stary sposob bez AJAX:
//Route::post('/new_services', [ServiceController::class, 'store'])->name('new_services.store');

//AJAX
Route::post('/new_services', [ServiceController::class, 'storeAJAX'])->middleware(['auth', 'verified'])->name('new_services.ajax.store');
///
Route::get('/new_services/{id}/edit', [ServiceController::class, 'edit'])->middleware(['auth', 'verified'])->name('new_services.edit');
//TODO: pridať do formulára povolenie meótd put a delete pre tieto cesty
Route::post('/new_services/put/{id}', [ServiceController::class, 'update'])->middleware(['auth', 'verified'])->name('new_services.update');
Route::post('/new_services/delete/{id}', [ServiceController::class, 'destroy'])->middleware(['auth', 'verified'])->name('new_services.destroy');
Route::get('/new_services/page/{page}', [ServiceController::class, 'getServicesByPage'])->name('new_services.getServicesByPage');
////////



//////////pre FINAL SEMESTRALKA VAII
Route::get('/new_all_companies', function(){
    //$services = Service::where('city_name','Žilina')->get();
    $companies = Company::all();
    return view('new_all_companies', ['companies' => $companies]);
})->middleware(['auth', 'verified'])->name('new_all_companies');
Route::get('/new_companies/create', [CompanyController::class, 'create'])->middleware(['auth', 'verified'])->name('new_companies.create');
Route::post('/new_companies', [CompanyController::class, 'store'])->middleware(['auth', 'verified'])->name('new_companies.store');
Route::get('/new_companies/{id}/edit', [CompanyController::class, 'edit'])->middleware(['auth', 'verified'])->name('new_companies.edit');
//TODO: pridať do formulára povolenie meótd put a delete pre tieto cesty
Route::post('/new_companies/put/{id}', [CompanyController::class, 'update'])->middleware(['auth', 'verified'])->name('new_companies.update');
Route::post('/new_companies/delete/{id}', [CompanyController::class, 'destroy'])->middleware(['auth', 'verified'])->name('new_companies.destroy');



Route::get('/new_all_workers', function(){
    //$services = Service::where('city_name','Žilina')->get();
    $workers = Worker::all();
    return view('new_all_workers', ['workers' => $workers]);
})->middleware(['auth', 'verified'])->name('new_all_workers');

Route::get('/new_workers/create', [WorkerController::class, 'create'])->middleware(['auth', 'verified'])->name('new_workers.create');
//Stary sposob bez AJAX:
//Route::post('/new_workers', [ServiceController::class, 'store'])->name('new_workers.store');
//AJAX
Route::post('/new_workers', [WorkerController::class, 'storeAJAX'])->middleware(['auth', 'verified'])->name('new_workers.ajax.store');
///
Route::get('/new_workers/{id}/edit', [WorkerController::class, 'edit'])->middleware(['auth', 'verified'])->name('new_workers.edit');
//TODO: pridať do formulára povolenie meótd put a delete pre tieto cesty
Route::post('/new_workers/put/{id}', [WorkerController::class, 'update'])->middleware(['auth', 'verified'])->name('new_workers.update');
Route::post('/new_workers/delete/{id}', [WorkerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('new_workers.destroy');
//////////



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
