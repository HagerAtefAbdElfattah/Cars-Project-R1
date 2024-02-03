 <div class="col-md-6 col-lg-4 mb-4">
    <div class="listing d-block  align-items-stretch">
    <div class="listing-img h-100 mr-4">
        <img src="{{asset ('assets/images/'.$car->image)}}" alt="{{$car->title}}" class="img-fluid" style="width: 300px;" >
    </div>
    <div class="listing-contents h-100">
        <h3>{{$car->title}}</h3>
        <div class="rent-price">
        <strong>${{$car->price}}</strong><span class="mx-1">/</span>day
        </div>
        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
        <div class="listing-feature pr-4">
            <span class="caption">Luggage:</span>
            <span class="number">{{$car->luggage}}</span>
        </div>
        <div class="listing-feature pr-4">
            <span class="caption">Doors:</span>
            <span class="number">{{$car->doors}}</span>
        </div>
        <div class="listing-feature pr-4">
            <span class="caption">Passenger:</span>
            <span class="number">{{$car->passengers}}</span>
        </div>
        </div>
        <div>
        <p>{{Str::of($car->content)->limit(100)}}</p>
        <p><a href="{{ route('singleCar', $car->id) }}" class="btn btn-primary btn-sm">Rent Now</a></p>
        </div>
    </div>

    </div>
</div>