<?php

namespace App\Http\Livewire\Dashboard\DoctorHub;

use App\Models\Patient;

use Livewire\Component;

class Index extends Component
{


    public function mount(): void
    {



    }

    public function render()
    {

        return view('livewire.dashboard.doctor-hub.index');
    }
}
