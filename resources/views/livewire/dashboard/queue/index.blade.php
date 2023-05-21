<div>

    <div wire:poll.1000ms>

        <h5>
            Showing Visits - {{ now()->format('Y/m/d - h:i:s A') }}
        </h5>

        @forelse($visits as $visit)

            <div
                class="d-flex justify-content-between text-body-secondary p-3 mt-3 rounded border @if($loop->first) border-success @endif @if($loop->index == 1) border-warning-subtle @endif">
                <div class="d-flex align-items-center">
                    <div>
                        <img
                            src="{{ asset('images/user.png') }}"
                            class="img-fluid me-2" style="width: 32px; height: 32px; object-fit: cover;"
                            alt="User Image">
                    </div>
                    <div>
                        <p class="mb-0 small lh-sm">
                            <strong class="d-block text-gray-dark">
                                {{ $visit->patient->name }}
                                <span class="badge bg-body-secondary">{{ $visit->status }}</span>
                            </strong>
                            {{ $visit->descripton }}
                            {{ $visit->created_at->format('Y/m/d - h:i A') }}
                        </p>
                    </div>
                </div>
                <div>
                    @if($visit->status == 'pending')

                        <button wire:click="atDoctor({{ $visit->id }})" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-send me-1"></i>
                            Send to doctor
                        </button>

                    @endif

                    @if($visit->status == 'at_doctor')

                        <button wire:click="updateStatus({{ $visit->id }}, 'done')"
                                class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-check2 me-1"></i>
                            Done
                        </button>

                    @endif

                        @if($visit->status == 'done')

                            <button wire:click="updateStatus({{ $visit->id }}, 'pending')"
                                    class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-clock-history me-1"></i>
                                Revert
                            </button>

                        @endif

                </div>
            </div>

        @empty
            <p class="text-center mt-5">
                You have no visits for today, <a href="{{ route('dashboard.patients.find', ['clinic' => $clinic->slug]) }}">find a patient</a> and
                create a visit to get started.
            </p>
        @endforelse

    </div>

</div>
