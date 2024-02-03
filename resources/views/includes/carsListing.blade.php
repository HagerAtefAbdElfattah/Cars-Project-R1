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
    </div>
</div>
