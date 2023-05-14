<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class VisitController extends Controller
{
    public function index(Patient $patient)
    {
        return view('dashboard.patients.visits.index', [
            'patient' => $patient
        ]);
    }

    public function create(Patient $patient)
    {
        return view('dashboard.patients.visits.create', [
            'patient' => $patient
        ]);
    }
}
