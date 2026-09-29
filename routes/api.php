<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\FederationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BureauController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::apiResource('sports', SportController::class);
Route::apiResource('members', MemberController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('leagues', LeagueController::class);
Route::apiResource('clubs', ClubController::class);
Route::apiResource('federations', FederationController::class);
Route::apiResource('admins', AdminController::class);
Route::apiResource('logs', LogController::class);
Route::apiResource('bureaus', BureauController::class);




