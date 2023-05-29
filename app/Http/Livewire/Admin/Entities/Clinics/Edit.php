<?php

namespace App\Http\Livewire\Admin\Entities\Clinics;

use App\Models\Clinic;
use App\Models\Entity;
use Livewire\Component;

class Edit extends Component
{
    public $entity;
    public $clinic;
    public string $name = '';
    public string $description = '';

    public function update()
    {
        $rules = [
            'name' => 'required|string|min:3|max:35',
            'description' => 'required|string|min:3|max:10000',
        ];

        $validated = $this->validate($rules);
        $this->clinic->update($validated);

        return redirect()->route('admin.entities.clinics.index', $this->entity->id);
    }


    public function mount(Entity $entity, Clinic $clinic): void
    {
        $this->entity = $entity;
        $this->clinic = $clinic;
        $this->name = $clinic->name;
        $this->description = $clinic->description;

    }

    public function render()
    {
        return view('livewire.admin.entities.clinics.edit');
    }
}
