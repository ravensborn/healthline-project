<?php

namespace App\Http\Livewire\Dashboard\Patients\Visits;

use App\Models\District;
use App\Models\Governorate;
use App\Models\Patient;
use App\Models\SubDistrict;
use App\Models\Visit;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{


    public $patient;
    public string $description = '';


    public function store()
    {

        sleep(1);

        $rules = [
            'description' => 'required|string|min:3|max:35',
        ];

        $validated = $this->validate($rules);
        $validated['patient_id'] = $this->patient->id;

        $visit = new Visit();
        $visit = $visit->create($validated);

        return redirect()->route('dashboard.queue.index');

    }

    public function mount(Patient $patient): void
    {
        $this->patient = $patient;

    }

    public function render()
    {
        return view('livewire.dashboard.patients.visits.create');
    }
}
