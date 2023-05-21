<div>
    <form wire:submit.prevent="store">

        <div class="row">
            @forelse($form->fields as  $field)

                @if($field['type'] == \App\Models\Form::FIELD_TYPE_TEXT || $field['type'] == \App\Models\Form::FIELD_TYPE_NUMBER)
                    <div class="col-12 col-md-6 offset-md-3 mt-3">
                        <label for="{{ $field['name'] }}"
                               class="form-label">
                            {{ $field['display_name'] }}
                        </label>
                        <input type="{{ $field['type'] }}"
                               class="form-control"
                               id="{{ $field['name'] }}"
                               wire:model="response.{{ $field['name'] }}">
                        @error('response.' . $field['name'])
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endif

                @if($field['type'] == \App\Models\Form::FIELD_TYPE_TEXTAREA)
                    <div class="col-12 col-md-6 offset-md-3 mt-3">
                        <label for="{{ $field['name'] }}"
                               class="form-label">
                            {{ $field['display_name'] }}
                        </label>
                        <textarea id="{{ $field['name'] }}"
                                  class="form-control"
                                  wire:model="response.{{ $field['name'] }}">
                            </textarea>
                        @error('response.' . $field['name'])
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endif

                @if($field['type'] == \App\Models\Form::FIELD_TYPE_FILE)
                    <div class="col-12 col-md-6 offset-md-3 mt-3">
                        <label for="{{ $field['name'] }}"
                               class="form-label">
                            {{ $field['display_name'] }}
                        </label>
                        <input type="{{ $field['type'] }}"
                               class="form-control"
                               id="{{ $field['name'] }}"
                               wire:model="response.{{ $field['name'] }}">
                        @error('response.' . $field['name'])
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                @endif

            @empty
                <div class="text-center text-warning">
                    No questions found in visitor addmission form, please <a href="{{ route('dashboard.forms.index', ['clinic' => $clinic->slug]) }}">click here to modify your questions</a>.
                </div>
            @endforelse
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
