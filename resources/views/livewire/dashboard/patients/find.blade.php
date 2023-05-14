<div>

    <div class="row">
        <div class="col-12 offset-0 col-md-8 offset-md-2 text-center">
            <h3 class="h3">Quick Search</h3>
            <label for="search" class="form-label fw-bold">Search for patient by name, email, phone number, or their unique
                code.</label>
            <input type="text" id="search" class="form-control" wire:model="search">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="spinner-border mt-5" role="status" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

        </div>
    </div>


    <div class="container" wire:loading.remove>

        <div class="row">
            <div class="col-10 offset-1">

                @forelse($patients as $patient)
                    <a href="{{ route('dashboard.patients.show', $patient->id) }}" class="text-decoration-none text-body">
                        <div class="d-flex justify-content-between text-body-secondary p-3 mt-3 rounded border">
                            <div class="d-flex">
                                <div>
                                    <img
                                        src="{{ asset('images/user.png') }}"
                                        class="img-fluid me-2" style="width: 32px; height: 32px; object-fit: cover;"
                                        alt="User Image">
                                </div>
                                <div>
                                    <p class="mb-0 small lh-sm">
                                        <strong class="d-block text-gray-dark">{{ $patient->name }}</strong>
                                        {{ $patient->code }}  {{ $patient->primary_phone_number }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('dashboard.patients.visits.create', $patient->id) }}" class="btn btn-sm btn-outline-primary">Create Visit</a>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center mt-5">
                        No patients found, please broaden your search query or <a href="{{ route('dashboard.patients.create') }}">create a new patient</a>.
                    </p>
                @endforelse
            </div>
        </div>

    </div>


</div>
