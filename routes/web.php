<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::view('/', "promp-form");

Route::post('/chat', [ChatController::class, 'chat'])->name('chat');

Route::get('pdf/{chat:id}', [ChatController::class, 'pdfGenerator'])->name('pdf');
