<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Website;
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

Route::get('/logout', function () {
    auth()->logout();
    return redirect()->route('home');
})->name('logout');


Route::get('/', [Website\PageController::class, 'welcome'])
    ->name('welcome');


Route::middleware(['auth'])->group(function () {

    Route::get('/my-space', [Website\PageController::class, 'mySpace'])
        ->name('home');

    Route::middleware('checkClinicMembership')->prefix('{clinic:slug}/dashboard')->as('dashboard.')->group(function () {


        Route::get('/', [Dashboard\PageController::class, 'overview'])
            ->name('overview');

        //Forms
        Route::middleware(['permission:manage forms'])->group(function () {

            Route::get('/forms', [Dashboard\FormController::class, 'index'])
                ->name('forms.index');

            Route::get('/forms/{form}/edit', [Dashboard\FormController::class, 'edit'])
                ->name('forms.edit');
        });


        //Patient
        Route::middleware(['permission:manage patients'])->group(function () {

            Route::get('/patients', [Dashboard\PatientController::class, 'index'])
                ->name('patients.index');

            Route::get('/patients/{patient}/show', [Dashboard\PatientController::class, 'show'])
                ->name('patients.show');

            Route::get('/patients/{patient}/edit', [Dashboard\PatientController::class, 'edit'])
                ->name('patients.edit');

            Route::get('/patients/create', [Dashboard\PatientController::class, 'create'])
                ->name('patients.create');

            Route::get('/patients/find', [Dashboard\PatientController::class, 'find'])
                ->name('patients.find');

            //Patient Visit
            Route::get('/patients/{patient}/visits', [Dashboard\VisitController::class, 'index'])
                ->name('patients.visits.index');

            Route::get('/patients/{patient}/visits/create', [Dashboard\VisitController::class, 'create'])
                ->name('patients.visits.create');

        });

        Route::middleware(['permission:manage queue'])->group(function () {

            Route::get('/queue', [Dashboard\QueueController::class, 'index'])
                ->name('queue.index');
        });

        Route::middleware(['permission:access doctor-hub'])->group(function () {

            Route::get('/doctor-hub', [Dashboard\DoctorHubController::class, 'index'])
                ->name('doctor-hub.index');
        });


    });

});

