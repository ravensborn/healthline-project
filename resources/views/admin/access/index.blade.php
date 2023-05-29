@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">User Access Control</h1>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Quick Access</h6>
            <div class="text-body-secondary pt-3">

                <a href="{{ route('admin.index') }}">Admin Home</a>
                &nbsp;
                <a href="{{ route('admin.entities.index') }}">List all entities</a>

            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                  @livewire('admin.access.index')

                </div>
            </div>
        </div>


    </div>

@endsection
