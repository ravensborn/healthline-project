@extends('layouts.app')

@section('content')

    <div class="row mt-5">
        <div class="col-12 text-center p-4">
            <h5>HealthLink</h5>
            <h1>My Space</h1>
        </div>
        <div class="col-12 text-center">
            <p>
                Welcome back <span class="fw-bold">{{ auth()->user()->name }}</span>, please select your desiered clinic
                to start processing patients.
            </p>
            @can('super-admin')
                <a href="{{ route('admin.index') }}">Access Admin Dashboard</a>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        @forelse($clinics as $clinic)

            <div class="col-12 col-md-4 mb-4">
                <a class="text-decoration-none" href="{{ route('dashboard.overview', ['clinic' => $clinic->slug]) }}">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">

                            <div class="fw-bold">
                                <i class="bi bi-box me-1"></i>
                                {{ $clinic->name }}'s Clinic
                            </div>

                            <small>
                                @if($clinic->isActive())
                                    <span class="badge bg-success">Active Subscription</span>
                                @else
                                    <span class="badge bg-danger">Subscription Expired</span>
                                @endif
                            </small>

                        </div>
                        <div class="card-body">
                            {{ $clinic->description }}
                            <span class="fw-bold">Click to open dashboard.</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="border rounded p-3 text-center">
               <span>
                   You don't have any clinics assigned to your account, please reach support to get started.
               </span>
            </div>
        @endforelse

    </div>

    <div class="mt-5 text-center">
        <p class="text-muted">
            Copyright &copy; {{ config('env.APP_NAME') }}
            &nbsp; &bull; &nbsp;
            <a class="text-muted text-decoration-none" href="{{ route('logout') }}">Logout</a>
        </p>

    </div>

    <div class="my-5 py-5">

    </div>

@endsection
