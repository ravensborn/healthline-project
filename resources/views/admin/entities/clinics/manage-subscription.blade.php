@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Manage {{ $clinic->name }}'s Subscription</h1>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Quick Access</h6>
            <div class="text-body-secondary pt-3">

                <a href="{{ route('admin.entities.clinics.index', $entity->id) }}">List {{ $clinic->name }}'s clinics</a>

            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <h5 class="h5 mb-3">Subscription of {{ $clinic->name }}'s clinic.</h5>

                    <div class="mt-3">
                        @livewire('admin.entities.clinics.manage-subscription', ['entity' => $entity->id, 'clinic' => $clinic->id])
                    </div>

                </div>
            </div>
        </div>


    </div>

@endsection
