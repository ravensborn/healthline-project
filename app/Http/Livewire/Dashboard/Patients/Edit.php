<?php

namespace App\Http\Livewire\Dashboard\Patients;

use App\Models\District;
use App\Models\Governorate;
use App\Models\Patient;
use App\Models\SubDistrict;
use Illuminate\Support\Collection;
use Livewire\Component;

class Edit extends Component
{

    public Collection $governorates;
    public Collection $districts;
    public Collection $subDistricts;

    public $patient;

    public string $name = '';
    public string $email = '';
    public string $primary_phone_number = '';
    public string $secondary_phone_number = '';
    public string $gender = '';
    public string $birthdate = '';
    public string $ethnicity = '';
    public string $occupation = '';
    public int $governorate_id = 0;
    public int $district_id = 0;
    public int $sub_district_id = 0;

    public function update()
    {

        sleep(1);

        $rules = [
            'name' => 'required|string|min:3|max:35',
            'email' => 'nullable|email|min:3|max:100',
            'primary_phone_number' => 'required|phone:IQ',
            'secondary_phone_number' => 'sometimes|required|phone:IQ',
            'gender' => 'required|in:male,female,other',
            'birthdate' => 'required|date',
            'ethnicity' => 'required|string|in:kurd,iraqi,syrian',
            'occupation' => 'required|string|min:3|max:100',
            'governorate_id' => 'required|integer|exists:governorates,id',
            'district_id' => 'required|integer|exists:districts,id',
            'sub_district_id' => 'required|integer|exists:sub_districts,id',
        ];

        $validated = $this->validate($rules);

        $this->patient->update($validated);

        return redirect()->route('dashboard.patients.show', ['patient' => $this->patient->id]);

    }

    public function updatedGovernorateId(): void
    {

        if ($this->governorate_id) {
            $this->districts = District::where('governorate_id', $this->governorate_id)->get();
        }

    }

    public function updatedDistrictId(): void
    {
        if ($this->district_id) {
            $this->subDistricts = SubDistrict::where('district_id', $this->district_id)->get();
        }
    }

    public function loadGovernorates(): void
    {
        $this->governorates = Governorate::with(['districts' => function ($query) {
            $query->with(['subDistricts']);
        }])->get();

        $this->districts = collect();
        $this->subDistricts = collect();

    }

    public function mount(Patient $patient): void
    {

        $this->patient = $patient;

        $this->name = $patient->name;
        $this->email = $patient->email;
        $this->primary_phone_number = $patient->primary_phone_number;
        $this->secondary_phone_number = $patient->secondary_phone_number;
        $this->gender = $patient->gender;
        $this->birthdate = $patient->birthdate;
        $this->ethnicity = $patient->ethnicity;
        $this->occupation = $patient->occupation;
        $this->governorate_id = $patient->governorate_id;
        $this->sub_district_id = $patient->sub_district_id;
        $this->district_id = $patient->district_id;

        $this->loadGovernorates();
        $this->updatedGovernorateId();
        $this->updatedDistrictId();



    }

    public function render()
    {
        return view('livewire.dashboard.patients.edit');
    }
}
