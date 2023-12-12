<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EssLoginController;
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
// Route::get('/auth/ess/callback', [\App\Http\Controllers\API\EssLoginController::class, 'callback']);

Route::get('/auth/ess', [EssLoginController::class, 'redirect']);

Route::get('/auth/ess/callback', [EssLoginController::class, 'callback']);
