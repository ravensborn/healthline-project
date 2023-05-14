<div>
    <form wire:submit.prevent="update">

        <div class="row">
            <div class="col-12 col-md-6">
                <label for="name" class="form-label">Patient Full Name <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="name" wire:model="name">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <label for="ethnicity" class="form-label">Ethnicity <small class="text-danger">*</small></label>
                <select id="ethnicity" class="form-control" wire:model="ethnicity">
                    <option value="">-- Select --</option>
                    <option value="kurd">Kurd</option>
                    <option value="iraqi">Iraqi</option>
                    <option value="syrian">Syrian</option>
                </select>
                @error('ethnicity')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-6">
                <label for="primary_phone_number" class="form-label">Primary Phone Number <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="primary_phone_number" wire:model="primary_phone_number">
                @error('primary_phone_number')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 col-md-6  mt-3 mt-md-0">
                <label for="secondary_phone_number" class="form-label">Secondary Phone Number <small class="text-muted">(optional)</small></label>
                <input type="text" class="form-control" id="secondary_phone_number" wire:model="secondary_phone_number">
                @error('secondary_phone_number')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <label for="birthdate" class="form-label">Date of Birth <small class="text-danger">*</small></label>
                <input type="date" class="form-control" id="birthdate" wire:model="birthdate">
                @error('birthdate')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0">
                <label for="occupation" class="form-label">Occupation <small class="text-danger">*</small></label>
                <input type="text" class="form-control" id="occupation" wire:model="occupation">
                @error('occupation')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0">
                <label for="email" class="form-label">E-Mail Address <small class="text-muted">(optional)</small></label>
                <input type="email" class="form-control" id="email" wire:model="email">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-4">
                <label for="governorate_id" class="form-label">Governorate</label>
                <select name="governorate_id" id="governorate_id" class="form-control" wire:model="governorate_id">
                    <option value="0">-- Select Governorate --</option>
                    @foreach($governorates as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('governorate_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0" >
                <label for="district_id" class="form-label">District</label>
                <select name="district_id" id="district_id" class="form-control" wire:model="district_id">
                    <option value="0">-- Select District --</option>
                    @foreach($districts as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('district_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 col-md-4 mt-3 mt-md-0">
                <label for="sub_district_id" class="form-label">Sub District</label>
                <select name="sub_district_id" id="sub_district_id" class="form-control" wire:model="sub_district_id">
                    <option value="0">-- Select Sub District --</option>
                    @foreach($subDistricts as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('sub_district_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div>Gender</div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="male" name="gender" wire:model="gender" id="genderMaleCheckbox">
                    <label class="form-check-label" for="genderMaleCheckbox">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="female" name="gender" wire:model="gender" id="genderFemaleCheckbox">
                    <label class="form-check-label" for="genderFemaleCheckbox">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="other" name="gender" wire:model="gender" id="genderOtherCheckbox">
                    <label class="form-check-label" for="genderOtherCheckbox">
                        Other
                    </label>
                </div>
                @error('gender')
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
