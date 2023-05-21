<?php

namespace App\Http\Livewire\Dashboard\Queue;

use App\Models\Clinic;
use App\Models\Patient;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{

    public $clinic;
    public Collection $visits;


    public function atDoctor(Visit $visit): void
    {

        $visits = Visit::where('clinic_id', $this->clinic->id)
            ->whereDate('created_at', today())
            ->whereIn('status', ['at_doctor'])
            ->update([
                'status' => 'done'
            ]);

        $visit->update([
            'status' => 'at_doctor'
        ]);
    }

    public function updateStatus(Visit $visit, $status): void
    {
        $visit->update([
            'status' => $status
        ]);
    }


    public function loadVisits(): void
    {
        $this->visits = Visit::where('clinic_id', $this->clinic->id)
            ->whereDate('created_at', Carbon::today())
            ->orderByRaw("FIELD(status , 'at_doctor', 'pending', 'done') ASC")
            ->get();
    }


    public function mount(Clinic $clinic): void
    {
        $this->clinic = $clinic;
    }

    public function render()
    {

        $this->loadVisits();

        return view('livewire.dashboard.queue.index');
    }
}
