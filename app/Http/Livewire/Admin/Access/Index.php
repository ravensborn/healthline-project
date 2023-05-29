<?php

namespace App\Http\Livewire\Admin\Access;

use App\Models\Clinic;
use App\Models\Entity;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    public string $clinic_search;
    public Collection $searchedClinics;
    public int $selectedClinicId = 0;

    public Collection $clinicUsers;
    public int $selectedUserId = 0;

    public Collection $roles;

    public string $new_clinic_user = '';

    public function saveUser(): void
    {
        $rules = [
            'new_clinic_user' => 'required|email|exists:users,email'
        ];

        $validated = $this->validate($rules);

        $user = User::where('email', $validated['new_clinic_user'])->firstOrFail();

        $selectedClinic = $this->searchedClinics->find($this->selectedClinicId);

        if (!$selectedClinic->users()->find($user->id)) {

            $selectedClinic->users()->attach($user);
            $this->new_clinic_user = '';

        } else {

            $this->addError('new_clinic_user', 'User already in clinic.');
        }
        $this->refresh();

    }

    public function checkIfRoleExist($role): bool
    {
        return true;
    }

    public function toggleSelectedUserRole($role): void
    {

        $selectedUser = $this->clinicUsers->find($this->selectedUserId);
        $selectedClinic = $this->searchedClinics->find($this->selectedClinicId);

        if ($selectedUser && $selectedClinic && $this->checkIfRoleExist($role)) {
            if ($selectedUser->hasRole($role)) {

                $selectedUser->removeRole($role);
            } else {

                $selectedUser->assignRole($role);
            }
        }
    }

    public function selectedUserHasRoleInSelectedClinic($role): bool
    {
        $selectedUser = $this->clinicUsers->find($this->selectedUserId);
        $selectedClinic = $this->searchedClinics->find($this->selectedClinicId);

        if ($selectedUser && $selectedClinic && $this->checkIfRoleExist($role)) {

            return (bool)$selectedUser->hasRole($role, $selectedClinic);
        }

        return false;
    }

    public function removeUserFromClinic($userId): void
    {

        $this->searchedClinics->find($this->selectedClinicId)->users()->detach($userId);
        $this->refresh();
        $this->selectedUserId = 0;
    }

    public function refresh(): void
    {

        $this->selectClinic($this->selectedClinicId);
        $this->selectUser($this->selectedUserId);
    }

    public function selectUser($id): void
    {
        $this->selectedUserId = $id;
    }

    public function getClinicUsers($id): void
    {
        $this->clinicUsers = User::whereHas('clinics', function ($query) use ($id) {
            $query->where('clinics.id', $id);
        })->get();
    }

    public function selectClinic($id): void
    {

        $this->selectedClinicId = $id;

        $this->getClinicUsers($id);
    }

    public function updatedClinicSearch(): void
    {

        $this->searchedClinics = Clinic::where('name', 'LIKE', '%' . $this->clinic_search . '%')
            ->limit(10)
            ->get();
    }

    public function mount(): void
    {

        $this->roles = Role::all();
        $this->searchedClinics = collect();
        $this->clinicUsers = collect();

    }

    public function render()
    {
        return view('livewire.admin.access.index');
    }
}
