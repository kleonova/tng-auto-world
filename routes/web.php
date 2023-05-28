<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
    return redirect()->route('cars.index');
});

Route::controller(CarController::class)->group(function () {
    Route::put('/cars/{car}/restore', 'restore')->name('cars.restore');
    Route::get('/cars/trash', 'trash')->name('cars.trash');
});
Route::resource('cars', CarController::class);


