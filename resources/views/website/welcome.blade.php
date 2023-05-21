@extends('layouts.app')

@section('content')

    <div class="row mt-5">
        <div class="col-12 text-center p-4">
            <h1>Welcome to HealthLine.</h1>


           <div class="mt-4">
               @auth
                   <h5>
                       Please click <a href="{{ route('home') }}">here</a> to access your space.
                   </h5>

               @else
                   <h5>
                       Please <a href="{{ route('login') }}"> login</a> to access your space.
                   </h5>
               @endauth
           </div>
        </div>
    </div>

@endsection
