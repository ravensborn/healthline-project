<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entity;

class EntityController extends Controller
{
    public function index() {
        return view('admin.entities.index');
    }

    public function create() {
        return view('admin.entities.create');
    }

    public function edit(Entity $entity) {

        return view('admin.entities.edit', [
            'entity' => $entity
        ]);
    }

}
