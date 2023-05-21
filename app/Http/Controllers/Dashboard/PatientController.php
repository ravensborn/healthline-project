<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Clinic $clinic)
    {
        return view('dashboard.patients.index', [
            'clinic' => $clinic
        ]);
    }

    public function show(Clinic $clinic, Patient $patient)
    {
        return view('dashboard.patients.show', [
            'clinic' => $clinic,
            'patient' => $patient
        ]);
    }

    public function create(Clinic $clinic)
    {
        return view('dashboard.patients.create', [
            'clinic' => $clinic
        ]);
    }

    public function edit(Clinic $clinic, Patient $patient) {

        return view('dashboard.patients.edit', [
            'clinic' => $clinic,
            'patient' => $patient
        ]);
    }

    public function find(Clinic $clinic)
    {

        return view('dashboard.patients.find', [
            'clinic' => $clinic
        ]);
    }
}
