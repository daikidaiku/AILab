<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGptController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/chat', [ChatGptController::class, 'index'])->name('chat_gpt-index');

Route::get('/chat', [ChatGptController::class, 'test'])->name('chat_gpt-index');
Route::post('/chat', [ChatGptController::class, 'chat'])->name('chat_gpt-chat');

Route::get('/', [ChatGptController::class, 'first'])->name('first');
Route::post('/',[ChatGptController::class,'get_first_keyword'])->name('get_first_keyword');

Route::get('/{selected_first_keyword}',[ChatGptController::class, 'second'])->name('second');
Route::post('/{selected_first_keyword}',[ChatGptController::class,'get_second_keyword'])->name('get_second_keyword');

Route::get('/{selected_first_keyword}/{selected_second_keyword}', [ChatGptController::class, 'third'])->name('third');
Route::post('/{selected_first_keyword}/{selected_second_keyword}', [ChatGptController::class, 'get_third_keyword'])->name('get_third_keyword');

Route::get('/{selected_first_keyword}/{selected_second_keyword}/{selected_third_keyword}', [ChatGptController::class, 'fourth'])->name('fourth');
Route::post('/{selected_first_keyword}/{selected_second_keyword}/{selected_third_keyword}', [ChatGptController::class, 'get_last_keyword'])->name('get_last_keyword');

Route::get('/{selected_first_keyword}/{selected_second_keyword}/{selected_third_keyword}/{last_keyword}', [ChatGptController::class, 'finish'])->name('finish');