<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;

class PageController extends Controller
{
    public function overview(Clinic $clinic) {

        return view('dashboard.overview', [
            'clinic' => $clinic
        ]);
    }
}
