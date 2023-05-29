@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Manage {{ $entity->name }}'s clinics</h1>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Quick Access</h6>
            <div class="text-body-secondary pt-3">

                <a href="{{ route('admin.entities.clinics.index', $entity->id) }}">List all clinics</a>

            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <h5 class="h5 mb-3">Create a new clinic.</h5>

                    <div class="mt-3">
                        @livewire('admin.entities.clinics.create', ['entity' => $entity->id])
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
