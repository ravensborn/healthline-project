<?php

namespace App\Http\Livewire\Dashboard\Patients;

use App\Models\Clinic;
use App\Models\District;
use App\Models\Governorate;
use App\Models\Patient;
use App\Models\SubDistrict;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $clinic;
    public Collection $governorates;
    public Collection $districts;
    public Collection $subDistricts;

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

    public function store()
    {

        sleep(1);

        $this->primary_phone_number = phone($this->primary_phone_number, 'IQ')->formatE164();
        $this->secondary_phone_number = phone($this->secondary_phone_number, 'IQ')->formatE164();

        $rules = [
            'name' => 'required|string|min:3|max:35',
            'email' => 'nullable|email|min:3|max:100',
            'primary_phone_number' => 'required|phone:IQ|unique:patients,primary_phone_number',
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

        $validated['code'] = Str::random(9);
        $validated['clinic_id'] = $this->clinic->id;

        $patient = new Patient;
        $patient = $patient->create($validated);

        return redirect()->route('dashboard.patients.show', ['clinic' => $this->clinic->slug, 'patient' => $patient->id]);

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

        if ($this->governorates->count() > 0) {

        }
    }

    public function mount(Clinic $clinic): void
    {
        $this->clinic = $clinic;
        $this->loadGovernorates();

//        if($this->cities->count() > 0) {
//            $this->city_id = $this->cities->first()->id;
//        }


    }

    public function render()
    {
        return view('livewire.dashboard.patients.create');
    }
}
