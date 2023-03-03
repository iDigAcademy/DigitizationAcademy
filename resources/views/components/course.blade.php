<aside class="col-md-6 col-sm-12 project {{ date_compare($course->end_date) ? 'future' : 'past' }}">
<div class="flip-card salanimate banner-form"
     style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-pack: end; -webkit-justify-content: flex-end; -ms-flex-pack: end; display-content: flex-end;"
     data-sal="slide-up" data-sal-duration="900" data-sal-delay="300">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <div class="card shadow-box">
                <img class="card-img-top"
                     src="{{ $course->present()->front_image }}"
                     alt="Card image cap" style="border-radius: 20px;">
                <div class="card-body pb-0">
                    <h4 class="card-title">{{ $course->title }}</h4>
                    <div class="card-text">
                        <span class="fw-bold">{{ t('Start') }}:</span> {{ date_day_string($course->start_date) }}<br>
                        <span class="fw-bold">{{ t('End') }}:</span> {{ date_day_string($course->end_date) }}
                    </div>
                    <div class="card-text">
                        <span class="fw-bold">{{ t('Schedule') }}:</span> {{ $course->schedule_details }}
                    </div>
                    <div class="card-text">
                        <span class="fw-bold">{{ t('Language') }}:</span> {{ $course->schedule_details }}
                    </div>
                </div>
            </div><!-- card -->
        </div> <!-- card front -->

        <div class="flip-card-back">
            <div class="card shadow-box">
                <img class="card-img-top"
                     src="{{ $course->present()->back_image }}"
                     alt="Card image cap"
                     style="border-radius: 20px; max-height: 100px;">
                <div class="card-body text-left">
                    <h5 class="card-title">{{ t('Objectives') }}</h5>
                    <p class="text-left">{{ $course->objectives }}</p>
                    <a href="#" class="btn btn-primary">{{ t('Register') }}</a>
                </div>
            </div><!-- card -->
        </div><!-- flip card back -->
    </div><!-- flip card inner -->
</div><!-- flip card -->
</aside>
