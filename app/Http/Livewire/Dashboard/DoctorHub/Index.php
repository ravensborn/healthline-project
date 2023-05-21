<?php

namespace App\Http\Livewire\Dashboard\DoctorHub;

use App\Models\Clinic;

use App\Models\Visit;
use Livewire\Component;

class Index extends Component
{

    public $clinic;
    public $patient;
    public $visit;

    public int $visitsToday = 0;
    public int $patientsTreatedToday = 0;
    public int $currentVisitsInQueue = 0;
    public int $missedPatientsToday = 0;

    public function updateStats(): void
    {

        $this->visitsToday = Visit::where('clinic_id', $this->clinic->id)
            ->whereDate('created_at', today())
            ->count();

        $this->patientsTreatedToday = Visit::where('clinic_id', $this->clinic->id)
            ->whereDate('created_at', today())
            ->where('status', Visit::STATUS_DONE)
            ->count();

        $this->currentVisitsInQueue = Visit::where('clinic_id', $this->clinic->id)
            ->whereDate('created_at', today())
            ->where('status', Visit::STATUS_PENDING)
            ->count();

        $this->missedPatientsToday = 14;
    }

    public function mount(Clinic $clinic): void
    {
        $this->clinic = $clinic;

        $this->updateStats();

        $this->visit = Visit::where('clinic_id', $this->clinic->id)
            ->where('status', Visit::STATUS_AT_DOCTOR)
            ->first();

        if($this->visit) {
            $this->patient = $this->visit->patient;
        }

    }

    public function render()
    {

        return view('livewire.dashboard.doctor-hub.index');
    }
}
