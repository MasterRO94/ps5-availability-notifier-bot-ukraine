<?php

use App\Http\Controllers\BotController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/webhook/{webhookSecret}', BotController::class);
