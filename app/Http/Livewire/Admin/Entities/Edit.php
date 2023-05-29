<?php

namespace App\Http\Livewire\Admin\Entities;

use App\Models\Entity;
use Livewire\Component;

class Edit extends Component
{
    public $entity;
    public string $name = '';

    public function update()
    {
        $rules = [
            'name' => 'required|string|min:3|max:35',
        ];

        $validated = $this->validate($rules);

        $entity = $this->entity->update($validated);

        return redirect()->route('admin.entities.index');
    }


    public function mount(Entity $entity): void
    {
        $this->entity = $entity;
        $this->name = $entity->name;
    }

    public function render()
    {
        return view('livewire.admin.entities.edit');
    }
}
