<?php

namespace App\Http\Livewire\Admin\Entities;

use App\Models\Entity;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';

    public function store()
    {


        $rules = [
            'name' => 'required|string|min:3|max:35',
        ];

        $validated = $this->validate($rules);

        $entity = new Entity;
        $entity = $entity->create($validated);

        return redirect()->route('admin.entities.index');

    }


    public function mount(): void
    {



    }

    public function render()
    {
        return view('livewire.admin.entities.create');
    }
}
