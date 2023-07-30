<?php

use App\Events\NewEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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

Route::get('/', function () {
    broadcast(new NewEvent('Message'));
    return view('welcome');
});

Route::get('/chats',[ChatController::class, 'chats']);
Route::post('/send',[ChatController::class, 'send']);
