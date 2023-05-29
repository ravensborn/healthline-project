@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Admin Page</h1>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-12">
                <div class="bg-body rounded shadow-sm p-3">

                    <a href="{{ route('admin.entities.index') }}">Manage Entities</a>
                    <a href="{{ route('admin.access.index') }}">Manage Access Control</a>
                    <a href="{{ route('admin.users.index') }}">Manage Users</a>

                </div>
            </div>
        </div>


    </div>

@endsection
