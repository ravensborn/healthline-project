<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {

        return view('dashboard.patients.index');
    }

    public function show(Patient $patient)
    {

        return view('dashboard.patients.show', [
            'patient' => $patient
        ]);
    }

    public function create()
    {

        return view('dashboard.patients.create');
    }

    public function edit(Patient $patient) {
        return view('dashboard.patients.edit', [
            'patient' => $patient
        ]);
    }

    public function find()
    {

        return view('dashboard.patients.find');
    }
}
