<?php

namespace App\Http\Livewire\Dashboard\Patients\Visits;

use App\Models\Clinic;
use App\Models\Form;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $clinic;
    public $patient;
    public $form;
    public array $response = [];


    public function handleResponseForm($visit): array
    {
        //Creating the rules.
        $rules = [];
        foreach ($this->form->fields as $field) {
            $rules['response.' . $field['name']] = $field['validation'];
        }

        $validated = $this->validate($rules);

        $processedResponse = [];

        foreach ($this->form->fields as $field) {

            $fieldData = $validated['response'][$field['name']];

            $data['type'] = $field['type'];
            $data['name'] = $field['name'];

            if ($field['type'] == Form::FIELD_TYPE_FILE) {

                $name = time() . '_' . Str::random(5);

                $attachment = $visit->addMedia($fieldData)
                    ->usingName($name)
                    ->usingFileName($name . '.' . $fieldData->getClientOriginalExtension())
                    ->toMediaCollection('attachments');

                $data['value'] = $attachment->getFullUrl();
            } else {
                $data['value'] = $fieldData;
            }

            $processedResponse[] = $data;
        }

        return $processedResponse;
    }

    public function store()
    {
        sleep(1);

        $validated['patient_id'] = $this->patient->id;
        $validated['clinic_id'] = $this->clinic->id;

        $visit = new Visit();
        $visit = $visit->create($validated);

        $response = $this->handleResponseForm($visit);
        $visit->update([
            'form_response' => $response,
        ]);

        return redirect()->route('dashboard.queue.index', ['clinic' => $this->clinic->slug]);
    }

    public function mount(Clinic $clinic, Patient $patient): void
    {
        $this->clinic = $clinic;
        $this->patient = $patient;
        $this->form = $clinic->visitorForm();
    }

    public function render()
    {
        return view('livewire.dashboard.patients.visits.create');
    }
}
