<div>
    <form wire:submit.prevent="update">

        <div class="row">
            <div class="col-12">
                <label for="name" class="form-label">Name <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="name" wire:model="name">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <label for="description" class="form-label">Description <small class="text-danger">*</small></label>
                <textarea id="description" class="form-control" wire:model="description"></textarea>
                @error('description')
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
