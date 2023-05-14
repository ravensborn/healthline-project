<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;

class QueueController extends Controller
{
    public function index(Patient $patient)
    {
        return view('dashboard.queue.index');
    }

}
