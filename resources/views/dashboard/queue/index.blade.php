@extends('layouts.dashboard', ['clinic' => $clinic])

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Queue Manager</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3 h-100">
                    <h5 class="h5">Quick Links</h5>
                    <p class="mt-3">

                        <a href="{{ route('dashboard.patients.find', ['clinic' => $clinic->slug]) }}" class="btn btn-outline-info btn-sm me-1">
                            <i class="bi bi-search"></i>
                            Find Patient
                        </a>

                    </p>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    @livewire('dashboard.queue.index', ['clinic' => $clinic->id])

                </div>
            </div>
        </div>



    </div>

@endsection
