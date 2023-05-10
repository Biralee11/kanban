<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\{RegisterController, LoginController};
use App\Http\Controllers\{DashboardController};
use App\Models\Role;

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

Route::get('/', [RegisterController::class, 'index'])->name('register');
Route::post('/', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::get('dashboard', [DashboardController::class, 'index'])->name('home');
Route::get('project', [DashboardController::class, 'project'])->name('project');
Route::post('project', [DashboardController::class, 'projectCreate']);
Route::get('project-detail', [DashboardController::class, 'projectDetail'])->name('projectDetail');
Route::get('delete_project', [DashboardController::class, 'deleteProject'])->name('delete_project');
