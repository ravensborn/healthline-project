<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Patient;

class QueueController extends Controller
{
    public function index(Clinic $clinic, Patient $patient)
    {
        return view('dashboard.queue.index', [
            'clinic' => $clinic,
        ]);
    }

}
