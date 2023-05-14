<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes([
    'register' => false
]);

Route::get('/', [Dashboard\PageController::class, 'overview'])
    ->name('home');

Route::get('/dashboard', [Dashboard\PageController::class, 'overview'])
    ->name('dashboard.overview');

//Patient
Route::get('/dashboard/patients', [Dashboard\PatientController::class, 'index'])
    ->name('dashboard.patients.index');

Route::get('/dashboard/patients/{patient}/show', [Dashboard\PatientController::class, 'show'])
    ->name('dashboard.patients.show');

Route::get('/dashboard/patients/{patient}/edit', [Dashboard\PatientController::class, 'edit'])
    ->name('dashboard.patients.edit');

Route::get('/dashboard/patients/create', [Dashboard\PatientController::class, 'create'])
    ->name('dashboard.patients.create');

Route::get('/dashboard/patients/find', [Dashboard\PatientController::class, 'find'])
    ->name('dashboard.patients.find');

//Patient Visit
Route::get('/dashboard/patients/{patient}/visits', [Dashboard\VisitController::class, 'index'])
    ->name('dashboard.patients.visits.index');

Route::get('/dashboard/patients/{patient}/visits/create', [Dashboard\VisitController::class, 'create'])
    ->name('dashboard.patients.visits.create');



Route::get('/dashboard/queue', [Dashboard\QueueController::class, 'index'])
    ->name('dashboard.queue.index');


Route::get('/dashboard/doctor-hub', [Dashboard\DoctorHubController::class, 'index'])
    ->name('dashboard.doctor-hub.index');

