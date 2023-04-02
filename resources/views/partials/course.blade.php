<div class="flip-card salanimate banner-form"
     style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-pack: end; -webkit-justify-content: flex-end; -ms-flex-pack: end; display-content: flex-end;"
     data-sal="slide-up" data-sal-duration="900" data-sal-delay="300">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <div class="card shadow-box">
                <img class="card-img-top"
                     src="{{ $course->present()->frontImage }}"
                     alt="Card image cap" style="border-radius: 20px;">
                <div class="card-body">
                    <h4 class="card-title">{{ $course->title }}</h4>
                    @include('partials.course-front-body')
                </div>
            </div><!-- card -->
        </div> <!-- card front -->

        <div class="flip-card-back">
            <div class="card shadow-box">
                <img class="card-img-top"
                     src="{{ $course->present()->backImage }}"
                     alt="Card image cap"
                     style="border-radius: 20px; max-height: 100px;">
                <div class="card-body text-left">
                    <h5 class="card-title">{{ t('Objectives') }}</h5>
                    <div class="card-text text-left mb--20">
                        {{ $course->objectives }}
                    </div>
                    @include('partials.course-back-body')
                </div>
            </div><!-- card -->
        </div><!-- flip card back -->
    </div><!-- flip card inner -->
</div><!-- flip card -->
