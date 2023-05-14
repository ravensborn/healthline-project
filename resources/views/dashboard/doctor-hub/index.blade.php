@extends('layouts.dashboard')

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Doctors Hub</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    @livewire('dashboard.doctor-hub.index')

                </div>
            </div>
        </div>



    </div>

@endsection
