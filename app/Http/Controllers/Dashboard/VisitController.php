<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Patient;

class VisitController extends Controller
{
    public function index(Clinic $clinic, Patient $patient)
    {
        return view('dashboard.patients.visits.index', [
            'clinic' => $clinic,
            'patient' => $patient
        ]);
    }

    public function create(Clinic $clinic, Patient $patient)
    {

        return view('dashboard.patients.visits.create', [
            'clinic' => $clinic,
            'patient' => $patient
        ]);
    }
}
