<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Patient;

class DoctorHubController extends Controller
{
    public function index(Clinic $clinic)
    {
        return view('dashboard.doctor-hub.index', [
            'clinic' => $clinic,
        ]);
    }

}
