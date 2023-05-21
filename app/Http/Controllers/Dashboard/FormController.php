<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Clinic;

class FormController extends Controller
{
    public function index(Clinic $clinic)
    {

        $forms = $clinic->forms;

        return view('dashboard.forms.index', [
            'clinic' => $clinic,
            'forms' => $forms,
        ]);
    }

    public function edit(Clinic $clinic, $form)
    {

        $form = $clinic->forms()->find($form);

        return view('dashboard.forms.edit', [
            'clinic' => $clinic,
            'form' => $form
        ]);
    }
}
