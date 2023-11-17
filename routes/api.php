<?php

use App\Http\Controllers\API\FaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('faq', [FaqController::class, 'index']);
Route::get('faq/{topic:slug}', [FaqController::class, 'topic']);
Route::get('faq/{topic:slug}/{question:slug}', [FaqController::class, 'question']);

Route::post('faq/{topic:slug}/{question:slug}/like', [FaqController::class, 'like'])->name('like');
Route::post('faq/{topic:slug}/{question:slug}/dislike', [FaqController::class, 'dislike'])->name('dislike');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
