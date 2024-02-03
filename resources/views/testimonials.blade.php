@extends('layouts.indexLayout')

@section('title','Testimonials')

@section('content')

  @include('includes.titlePages')

     <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        <div class="row">
            @each('includes.testimonialsRow', $testimonials, 'testimonial') 
        </div>
      </div>
    </div>

   {{-- Footer rent a car --}}
          @include('includes.footerRentCar')
   {{-- /Footer rent a car --}}     
@endsection  