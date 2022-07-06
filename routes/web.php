<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [FloorController::class, 'getFirstFloorPage'])->name('first_floor');
//
//Route::get('first_half_floor', [FloorController::class, 'getFirstHalfFloorPage'])->name('first_half_floor');
//
//Route::get('second_floor', [FloorController::class, 'getSecondFloorPage'])->name('second_floor');
//
//Route::get('third_floor', [FloorController::class, 'getThirdFloorPage'])->name('third_floor');
//
//Route::get('/en', [FloorController::class, 'getFirstFloorPageEN'])->name('first_floor_en');
//
//Route::get('first_half_floor_en', [FloorController::class, 'getFirstHalfFloorPageEN'])->name('first_half_floor_en');
//
//Route::get('second_floor_en', [FloorController::class, 'getSecondFloorPageEN'])->name('second_floor_en');
//
//Route::get('third_floor_en', [FloorController::class, 'getThirdFloorPageEN'])->name('third_floor_en');

Route::controller(FloorController::class)->group(function (){

    Route::get('/', 'getFirstFloorPage')->name('first_floor');

    Route::get('first_half_floor', 'getFirstHalfFloorPage')->name('first_half_floor');

    Route::get('second_floor', 'getSecondFloorPage')->name('second_floor');

    Route::get('third_floor', 'getThirdFloorPage')->name('third_floor');

    Route::get('en', 'getFirstFloorPageEN')->name('first_floor_en');

    Route::get('first_half_floor_en', 'getFirstHalfFloorPageEN')->name('first_half_floor_en');

    Route::get('second_floor_en', 'getSecondFloorPageEN')->name('second_floor_en');

    Route::get('third_floor_en', 'getThirdFloorPageEN')->name('third_floor_en');

});
