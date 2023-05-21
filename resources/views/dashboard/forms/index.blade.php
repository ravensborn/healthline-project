@extends('layouts.dashboard', ['clinic' => $clinic])

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">


        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Manage Forms</h1>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <h5 class="h5 mb-3">Available Forms</h5>

                    <table class="table table-bordered table-sm">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Fields</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($forms as $form)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $form->name }}</td>
                                <td class="text-center">
                                    @foreach($form->fields as $field)
                                        <div class="badge bg-info">
                                            {{ $field['display_name'] }}
                                        </div>
                                    @endforeach
                                </td class=text-center>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{ route('dashboard.forms.edit', ['clinic' => $clinic->slug, 'form' => $form->id]) }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>

@endsection
