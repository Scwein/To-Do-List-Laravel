<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', TaskController::class);
Route::fallback(function () {
    return response()->json(["msg" => 'Route not found'], 404);
});