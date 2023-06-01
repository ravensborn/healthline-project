<?php

namespace App\Http\Livewire\Admin\Entities\Clinics;

use App\Models\Clinic;
use App\Models\Entity;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ManageSubscription extends Component
{

    use LivewireAlert;

    public $entity;
    public $clinic;
    public string $months = '12';

    public function update()
    {
        $rules = [
            'months' => 'required|integer|max:100',
        ];

        $validated = $this->validate($rules);
        $this->clinic->update([
            'subscription' => $this->clinic->subscription->addMonths($validated['months']),
        ]);

        $this->alert('success', 'Successfully updated subscription.');
    }


    public function mount(Entity $entity, Clinic $clinic): void
    {
        $this->entity = $entity;
        $this->clinic = $clinic;
    }

    public function render()
    {
        return view('livewire.admin.entities.clinics.manage-subscription');
    }
}
