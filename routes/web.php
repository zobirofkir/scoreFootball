<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\searchController;

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

Route::get('/search-fixtures', [FootballController::class, 'searchFixtures'])->name('searchFixtures');

Route::get('/', [FootballController::class, 'getFixturesData']);
// Route::get("/", function(){
//     return view("welcome");
// });