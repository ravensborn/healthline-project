<div>
    <form wire:submit.prevent="store">

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <label for="description" class="form-label">Brief Description <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="description" wire:model="description">
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>


        <div class="row mt-3">
            <div class="col text-center">
                <hr>
                <button type="submit" class="btn btn-primary" style="width: 200px;">
                    <i class="bi bi-check2"></i>
                    Save
                    <span wire:loading wire:target="store"> - Processing...</span>
                </button>
            </div>
        </div>


    </form>
</div>
