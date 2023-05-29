<div>

    <div class="row mb-3">
        <div class="col-12">
            <div class="bg-body rounded shadow-sm p-3">

                <div class="mt-3">
                    <label for="clinic_search" class="form-label">Find Clinic</label>
                    <input type="text" id="clinic_search" class="form-control" wire:model="clinic_search">
                </div>

                <div class="mt-3">
                    <div class="d-flex">
                        @foreach($searchedClinics as $key => $clinic)
                            @if($clinic->id == $selectedClinicId)
                                <button
                                    wire:key="clinic_{{ $key }}"
                                    class="btn btn-primary btn-sm rounded border me-2"> {{ $clinic->name }} </button>
                            @else
                                <button
                                    wire:key="clinic_{{ $key }}"
                                    class="btn  btn-sm rounded border me-2"
                                    wire:click="selectClinic({{ $clinic->id }})"> {{ $clinic->name }} </button>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if($selectedClinicId)

                    <div class="mt-3">
                        Add user to clinic
                    </div>

                <div class="mt-3">
                   <div class="row">
                       <div class="col-md-3 col-12">
                           <div class="d-flex">
                               <div class="me-2">
                                   <input type="email" id="email" class="form-control form-control-sm" wire:model="new_clinic_user">
                                   @error('new_clinic_user')
                                   <small class="text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                               <div>
                                   <button class="btn btn-outline-primary btn-sm" wire:click="saveUser">Add</button>
                               </div>
                           </div>

                       </div>
                   </div>
                </div>


                    <div class="mt-3">
                        Clinic Users
                    </div>

                    <div class="mt-3">
                        <div class="d-flex">
                            @forelse($clinicUsers as $key => $user)
                                @if($user->id == $selectedUserId)
                                    <button
                                        wire:key="user_{{ $key }}"
                                        class="btn btn-primary btn-sm rounded border me-2"> {{ $user->name }} </button>
                                @else
                                    <button
                                        wire:key="user_{{ $key }}"
                                        class="btn  btn-sm rounded border me-2"
                                        wire:click="selectUser({{ $user->id }})"> {{ $user->name }} </button>
                                @endif
                            @empty
                                This clinic does not have any users.
                            @endforelse
                        </div>
                    </div>
                @endif

                @if($selectedUserId)

                    <div class="mt-3">
                        Available Options
                    </div>

                    <div class="mt-3">
                        <div class="d-flex">
                            <button class="btn btn-outline-danger btn-sm rounded border me-2"
                                    wire:click="removeUserFromClinic({{ $selectedUserId }})">
                                <i class="bi bi-dash"></i>
                                Remove from clinic
                            </button>
                        </div>
                    </div>

                    <div class="mt-3">
                        Manage Roles
                    </div>

                    <div class="mt-3">
                        <div class="d-flex">
                            @foreach($roles as $key => $role)
                                @if($this->selectedUserHasRoleInSelectedClinic($role))
                                    <button
                                        class="btn btn-info btn-sm rounded border me-2"
                                        wire:key="role_{{ $key }}"
                                        wire:click="toggleSelectedUserRole('{{ $role->name }}')">
                                        <i class="bi bi-check2"></i>
                                        {{ ucwords($role->name) }}
                                    </button>
                                @else
                                    <button
                                        class="btn btn-sm rounded border me-2"
                                        wire:key="role_{{ $key }}"
                                        wire:click="toggleSelectedUserRole('{{ $role->name }}')">
                                        <i class="bi bi-dash"></i>
                                        {{ ucwords($role->name) }}
                                    </button>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>
