<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Entity;

class AccessController extends Controller
{
    public function index()
    {
        return view('admin.access.index');
    }



}
