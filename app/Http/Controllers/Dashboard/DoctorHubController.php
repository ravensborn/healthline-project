<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class DoctorHubController extends Controller
{
    public function index()
    {
        return view('dashboard.doctor-hub.index');
    }

}
