@extends('layouts.dashboard')

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
                        <a href="{{ route('dashboard.overview') }}">Home</a>

                        &nbsp;
                        <a href="{{ route('dashboard.patients.create') }}">Create a new patient</a>
                        &nbsp;
                        <a href="{{ route('dashboard.patients.find') }}">Find patient</a>
                        &nbsp;
                        <a href="{{ route('dashboard.patients.edit', $patient->id) }}">Edit this patient's details</a>
                        &nbsp;
                        <a href="{{ route('dashboard.patients.visits.create', $patient->id) }}">Create a visit for this patient</a>

                    </p>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5 class="h5">Basic Information</h5>
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <td>E-Mail Address</td>
                                <td>{{ $patient->email }}</td>
                            </tr>
                            <tr>
                                <td>Primary Phone Number</td>
                                <td>{{ $patient->primary_phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Secondary Phone Number</td>
                                <td>{{ $patient->secondary_phone_number }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5 class="h5">Other Information</h5>
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Code</td>
                                <td>{{ $patient->code }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $patient->gender }}</td>
                            </tr>
                            <tr>
                                <td>Birthdate</td>
                                <td>{{ $patient->birthdate }}</td>
                            </tr>
                            <tr>
                                <td>Ethnicity</td>
                                <td>{{ $patient->ethnicity }}</td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td>{{ $patient->occupation }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $patient->governorate->name . ' - ' . $patient->district->name . ' - ' . $patient->subDistrict->name }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5 class="h5">Visit History</h5>
                    <hr>

                    <p>No visits yet.</p>

                </div>
            </div>
        </div>


    </div>

@endsection
