<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\EducationController;
use \App\Http\Controllers\SkillsController;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\ExperienceController;
use \App\Http\Controllers\ResponsibilitiesController;
use \App\Http\Controllers\ProjectsController;
use \App\Http\Controllers\StacksController;

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

Route::get('getresume', [Controller::class, "getresume"]);

Route::resource('users', UserController::class);
Route::resource('education', EducationController::class);
Route::resource('skills', SkillsController::class);
Route::resource('experiences', ExperienceController::class);
Route::resource('responsibilities', ResponsibilitiesController::class);
Route::resource('projects', ProjectsController::class);
Route::resource('stacks', StacksController::class);