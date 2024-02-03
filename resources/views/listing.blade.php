@extends('layouts.indexLayout')

@section('title','Listing')

@section('content')

  @include('includes.titlePages')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        
       
            <div class="row">
              @each('includes.carsRow', $cars, 'car')
            </div>
           
         

            <div class="row">
    <div class="col-5">
        <div class="custom-pagination">

            @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                @if ($page == $cars->currentPage())
                    <span class="current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

        </div>
    </div>
</div>
       
    <div class="site-section">
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