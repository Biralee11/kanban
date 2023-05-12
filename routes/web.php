<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\{RegisterController, LoginController};
use App\Http\Controllers\{DashboardController};
use App\Models\Role;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('dashboard', [DashboardController::class, 'index'])->name('home')->middleware('auth');
Route::get('project', [DashboardController::class, 'project'])->name('project')->middleware('auth');
Route::post('project', [DashboardController::class, 'projectCreate'])->middleware('auth');
Route::get('project-detail', [DashboardController::class, 'projectDetail'])->name('projectDetail')->middleware('auth');

Route::post('task-add', [DashboardController::class, 'taskCreate'])->name('taskcreate')->middleware('auth');


Route::get('delete_project', [DashboardController::class, 'deleteProject'])->name('delete_project')->middleware('auth');
