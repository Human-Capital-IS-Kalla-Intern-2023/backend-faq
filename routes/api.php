<?php


use App\Http\Controllers\API\TopicController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\EssLoginController;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::get('/auth/ess', [EssLoginController::class, 'redirect']);
Route::get('/auth/ess/callback', [EssLoginController::class, 'callback']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('faq/topics', [TopicController::class, 'index']);
    Route::post('faq/topics', [TopicController::class, 'store']);
    Route::get('faq/topics/{slug}', [TopicController::class, 'show']);
    Route::get('faq/topics/edit/{slug}', [TopicController::class, 'edit']);
    Route::put('faq/topics/{slug}', [TopicController::class, 'update']);
    Route::delete('faq/topics/{slug}', [TopicController::class, 'destroy']);
    Route::put('faq/topics/is_active/{slug}', [TopicController::class, 'updateIsActive']);

    Route::get('faq/questions', [QuestionController::class, 'index']);
    Route::post('faq/questions', [QuestionController::class, 'store']);
    Route::get('faq/questions/{slug}', [QuestionController::class, 'show']);
    Route::put('faq/questions/{slug}', [QuestionController::class, 'update']);
    Route::delete('faq/questions/{slug}', [QuestionController::class, 'destroy']);
    Route::put('faq/questions/is_active/{slug}', [QuestionController::class, 'updateIsActive']);
});

Route::get('faq', [FaqController::class, 'index']);
Route::get('faq/{name}', [FaqController::class, 'topic']);
Route::get('navbar', [FaqController::class, 'navbar']);
Route::get('faq/{name}/{slug}', [FaqController::class, 'question']);

Route::post('faq/{name}/{slug}/like', [FaqController::class, 'like'])->name('like');
Route::post('faq/{name}/{slug}/dislike', [FaqController::class, 'dislike'])->name('dislike');



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
