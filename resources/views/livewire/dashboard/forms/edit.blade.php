<div>

    <div class="row mb-3">
        <div class="col-12">
            <div class="bg-body rounded shadow-sm p-3">

                <h5>Editing - {{ $form->name }}</h5>

                <p>
                    This page allows you to update details of a form including the field names, types and more.
                </p>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Display Name</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Validation</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($form->fields as $index => $field)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $field['display_name'] }}</td>
                                <td>{{ $field['name'] }}</td>
                                <td>{{ $field['type'] }}</td>
                                <td>{{ $field['validation'] }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" wire:click="removeField({{ $index }})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">There are no fields currently, please use the
                                    following form to add new fields.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-md-6">
            <div class="bg-body rounded shadow-sm p-3">

                <h5>Add new field</h5>

                <form wire:submit.prevent="addNewField">

                    <div class="mt-3">
                        <label for="display_name" class="form-label">Display Name</label>
                        <input type="text" class="form-control" id="display_name" wire:model="display_name">
                        @error('display_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="type" class="form-label">Display Name</label>
                        <select id="type" class="form-control" wire:model="field_type">
                            <option value="">-- Select type --</option>
                            @foreach($fieldTypes as $type)
                                <option value="{{ $type }}">{{ ucwords($type) }}</option>
                            @endforeach
                        </select>
                        @error('field_type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label for="validation" class="form-label">Validation Rules <small>(straight slash
                                seperated)</small></label>
                        <input type="text" class="form-control" id="validation" wire:model="validation_rules">
                        @error('validation_rules')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="bg-body rounded shadow-sm p-3">

                <h5>Predefined questions</h5>

                @forelse($predefinedQuestions as $index => $question)
                    <span class="badge bg-secondary" style="cursor: pointer;"
                          wire:click="addFromPredefinedQuestions({{ $index }})">
                        {{ $question['display_name'] }}
                    </span>
                @empty
                    <div>
                        There are no questions here.
                    </div>
                @endforelse

            </div>
        </div>

    </div>

</div>
