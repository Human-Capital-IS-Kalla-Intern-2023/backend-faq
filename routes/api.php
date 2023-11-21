<?php


use App\Http\Controllers\API\TopicController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\QuestionController;
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



Route::get('faq/topics', [TopicController::class, 'index']);
Route::post('faq/topics', [TopicController::class, 'store']);
Route::get('faq/topics/{slug}', [TopicController::class, 'show']);
Route::put('faq/topics/{slug}', [TopicController::class, 'update']);
Route::delete('faq/topics/{slug}', [TopicController::class, 'destroy']);

Route::get('faq/questions', [QuestionController::class, 'index']);
Route::post('faq/questions', [QuestionController::class, 'store']);
Route::get('faq/questions/{slug}', [QuestionController::class, 'show']);
Route::put('faq/questions/{slug}', [QuestionController::class, 'update']);
Route::delete('faq/questions/{slug}', [QuestionController::class, 'destroy']);


Route::get('faq', [FaqController::class, 'index']);
Route::get('faq/{name}', [FaqController::class, 'topic']);
Route::get('faq/{name}/{slug}', [FaqController::class, 'question']);

Route::post('faq/{name}/{slug}/like', [FaqController::class, 'like'])->name('like');
Route::post('faq/{name}/{slug}/dislike', [FaqController::class, 'dislike'])->name('dislike');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
