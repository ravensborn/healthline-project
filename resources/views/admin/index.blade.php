@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Admin Panel</h1>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <a class="btn btn-outline-primary" href="{{ route('home') }}">
                        <i class="bi bi-house"></i>
                        Website Home
                    </a>

                    <a class="btn btn-outline-primary" href="{{ route('admin.entities.index') }}">
                        <i class="bi bi-box"></i>
                        Manage Entities
                    </a>
                    <a class="btn btn-outline-primary" href="{{ route('admin.access.index') }}">
                        <i class="bi bi-shield"></i>
                        Manage Access Control
                    </a>
                    <a class="btn btn-outline-primary" href="{{ route('admin.users.index') }}">
                        <i class="bi bi-people"></i>
                        Manage Users
                    </a>

                </div>
            </div>
        </div>


    </div>

@endsection
