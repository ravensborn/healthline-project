@extends('layouts.dashboard')

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Manage Patient Visits</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5 class="h5">Quick Links</h5>
                    <p>
                        <a href="{{ route('dashboard.overview') }}">Home</a>
                        &nbsp;
                        <a href="{{ route('dashboard.patients.show', $patient->id) }}">Patient details</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">
                  <div class="d-flex justify-content-start align-items-center">
                      <div class="me-3">
                          <img style="width: 64px; height: 64px;" src="{{ asset('images/user.png') }}" alt="User Logo">
                      </div>
                      <div>
                          <h5>{{ $patient->name }}</h5>
                          <h6>{{ $patient->email }}</h6>
                          <h6>{{ $patient->primary_phone_number }}, {{ $patient->secondary_phone_number }}</h6>
                      </div>
                  </div>
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <p>
                        This page allows you to create a new patient visit by filling the required information.
                    </p>
                    <hr>

                    @livewire('dashboard.patients.visits.create', ['patient' => $patient->id])

                </div>
            </div>
        </div>



    </div>

@endsection
