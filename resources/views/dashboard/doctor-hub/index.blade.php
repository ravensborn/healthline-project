@extends('layouts.dashboard', ['clinic' => $clinic])

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Doctors Hub</h1>
            </div>
        </div>

        @livewire('dashboard.doctor-hub.index', ['clinic' => $clinic->id])


    </div>

@endsection
