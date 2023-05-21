<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function welcome() {

        return view('website.welcome');
    }

    public function mySpace() {

        $clinics = auth()->user()->clinics;

        return view('website.my-space', [
            'clinics' => $clinics,
        ]);
    }
}
