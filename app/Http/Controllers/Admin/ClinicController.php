<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Entity;

class ClinicController extends Controller
{
    public function index(Entity $entity)
    {

        return view('admin.entities.clinics.index', [
            'entity' => $entity
        ]);
    }

    public function create(Entity $entity)
    {
        return view('admin.entities.clinics.create', [
            'entity' => $entity
        ]);
    }

    public function edit(Entity $entity, Clinic $clinic)
    {
        return view('admin.entities.clinics.edit', [
            'entity' => $entity,
            'clinic' => $clinic,
        ]);
    }

    public function manageSubscription(Entity $entity, Clinic $clinic)
    {
        return view('admin.entities.clinics.manage-subscription', [
            'entity' => $entity,
            'clinic' => $clinic,
        ]);
    }


}
