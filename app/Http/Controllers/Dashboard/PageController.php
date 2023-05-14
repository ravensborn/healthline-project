<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function overview() {

        return view('dashboard.overview');
    }
}
