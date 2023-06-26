<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ReplyController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('discussion',DiscussionController::class);

Route::resource('discussion/{discussion}/reply',ReplyController::class);

Route::post("discussion/{discussion}/reply/{reply}/mark-as-best-reply", [DiscussionController::class, 'bestReply'])->name('discussion.mark-as-best');