<?php

namespace App\Http\Livewire\Admin\Entities\Clinics;

use App\Models\Clinic;
use App\Models\Entity;
use Livewire\Component;

class Create extends Component
{
    public $entity;
    public $clinic;
    public string $name = '';
    public string $description = '';

    public function store()
    {

        sleep(1);

        $rules = [
            'name' => 'required|string|min:3|max:35',
            'description' => 'required|string|min:3|max:10000',
        ];

        $validated = $this->validate($rules);

        $validated['entity_id'] = $this->entity->id;

        $clinic = new Clinic;
        $clinic = $clinic->create($validated);

        return redirect()->route('admin.entities.clinics.index', ['entity' => $this->entity->id]);

    }


    public function mount(Entity $entity): void
    {
        $this->entity = $entity;
    }

    public function render()
    {
        return view('livewire.admin.entities.clinics.create');
    }
}
