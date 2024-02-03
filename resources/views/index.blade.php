@extends('layouts.indexLayout')

@section('content')
    {{-- Title --}}
        @include('includes.titleIndex')
    {{-- /Title --}}
              
            {{-- get started --}}
                 @include('includes.getStarted')
            {{-- /get started --}}

            {{-- cars listing --}}
                 @include('includes.carsListing')
            {{-- /cars listing --}}

            {{-- features --}}
                 @include('includes.features')
            {{-- /features --}}

            {{-- testimonials --}}
                 @include('includes.testimonialsListing')
            {{-- /testimonials --}}

            {{-- Footer rent a car --}}
                 @include('includes.footerRentCar')
            {{-- /Footer rent a car --}}     

@endsection