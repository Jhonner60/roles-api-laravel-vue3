<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1/auth")->group(function(){ // NO NECESITAN PERMISOS PARA ACCIONAR
    Route::post("login", [AuthController::class, "funIngresar"]);
    Route::post("register", [AuthController::class, "funRegistro"]);

    Route::middleware("auth:sanctum")->group(function(){ // NECESTAN PERMISOS
        Route::post("profile", [AuthController::class, "funPerfil"]);
        Route::post("logout", [AuthController::class, "funSalir"]);
    });
    
});


