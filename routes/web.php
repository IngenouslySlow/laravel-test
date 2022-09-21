<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodesController;

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

// Get
Route::get('/', [CodesController::class, 'index'])->name('home.index');

// Post
Route::post('/', [CodesController::class, 'getCodes'])->name('home.show');
