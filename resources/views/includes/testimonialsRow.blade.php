<div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
            <blockquote class="mb-4">
                <p>"{{$testimonial->content}}"</p>
            </blockquote>
            <div class="d-flex v-card align-items-center">
                <img src="{{asset('assets/images/'.$testimonial->image)}}" alt="{{ $testimonial->name }}" class="img-fluid mr-3">
                <div class="author-name">
                <span class="d-block">{{ $testimonial->name }}</span>
                <span>{{ $testimonial->position }}</span>
                </div>
            </div>
            </div>
        </div>