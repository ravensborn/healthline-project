<div>

    <div>
       Current status: @if($clinic->isActive()) <span class="badge bg-success">Active</span> @else <span class="badge bg-danger">Expired</span> @endif
    </div>
    <div>
        Subscribed until: {{ $clinic->subscription->format('Y-m-d') }}
    </div>
    <form wire:submit.prevent="update">

        <div class="row">
            <div class="col-12">
                <label for="date" class="form-label">Add months <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="date" wire:model="months">
                @error('months')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <hr>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check2"></i>
                    Update
                    <span wire:loading wire:target="update"> - Processing...</span>
                </button>
            </div>
        </div>

    </form>
</div>
