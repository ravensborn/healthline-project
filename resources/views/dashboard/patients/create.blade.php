@extends('layouts.dashboard', ['clinic' => $clinic])

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Manage Patients</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5 class="h5">Quick Links</h5>
                    <p>
                        <a href="{{ route('dashboard.overview', ['clinic' => $clinic->slug]) }}">Home</a>
                        &nbsp;
                        <a href="{{ route('dashboard.patients.find', ['clinic' => $clinic->slug]) }}">Find patient</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <p>
                        This page allows you to create a new patient by filling their basic information, like name,
                        email, phone numbers, date of birth and other necessary information.
                    </p>
                    <hr>

                    @livewire('dashboard.patients.create', ['clinic' => $clinic->id])

                </div>
            </div>
        </div>



    </div>

@endsection
