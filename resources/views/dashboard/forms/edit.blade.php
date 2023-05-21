@extends('layouts.dashboard', ['clinic' => $clinic])

@section('content')

    @include('dashboard.components.secondary-navbar')

    <div class="container">

        <div class="row my-3">
            <div class="col-12">
                <h1 class="h3">Manage Forms</h1>
            </div>
        </div>



        @livewire('dashboard.forms.edit', ['clinic' => $clinic->id, 'form' => $form->id])



    </div>

@endsection
