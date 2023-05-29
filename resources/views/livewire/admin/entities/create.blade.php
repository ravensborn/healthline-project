<div>
    <form wire:submit.prevent="store">

        <div class="row">
            <div class="col-12 col-md-6">
                <label for="name" class="form-label">Name <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="name" wire:model="name">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <hr>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check2"></i>
                    Save
                    <span wire:loading wire:target="store"> - Processing...</span>
                </button>
            </div>
        </div>

    </form>
</div>
