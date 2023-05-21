<?php

namespace App\Http\Livewire\Dashboard\Patients;

use App\Models\Clinic;
use App\Models\Patient;
use Illuminate\Support\Collection;
use Livewire\Component;

class Find extends Component
{

    public $clinic;
    public Collection $patients;

    public string $search = '';

    public function updatedSearch(): void
    {
        $this->processSearch();
    }


    public function processSearch(): void
    {

        if ($this->search) {

            $patients = Patient::query();


            $search = '%' . $this->search . '%';

            $patients->where(function ($patients) use ($search) {
                $patients->where('code', 'LIKE', $search)
                    ->orWhere('name', 'LIKE', $search)
                    ->orWhere('email', 'LIKE', $search)
                    ->orWhere('primary_phone_number', 'LIKE', $search)
                    ->orWhere('secondary_phone_number', 'LIKE', $search);
            });

            $patients->where('clinic_id', $this->clinic->id);

            $this->patients = $patients->limit(5)->get();
        }
    }

    public function mount(Clinic $clinic): void
    {
        $this->clinic = $clinic;
        $this->patients = collect();
    }

    public function render()
    {

        return view('livewire.dashboard.patients.find');
    }
}
