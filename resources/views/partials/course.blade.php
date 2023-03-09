<div class="flip-card salanimate banner-form"
     style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-pack: end; -webkit-justify-content: flex-end; -ms-flex-pack: end; display-content: flex-end;"
     data-sal="slide-up" data-sal-duration="900" data-sal-delay="300">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <div class="card shadow-box">
                <img class="card-img-top"
                     src="{{ $course->present()->front_image }}"
                     alt="Card image cap" style="border-radius: 20px;">
                <div class="card-body">
                    <h4 class="card-title">{{ $course->title }}</h4>
                    <div class="card-text">
                        <span class="fw-bold">{{ t('Start') }}:</span> {{ date_day_string($course->start_date) }}<br>
                        <span class="fw-bold">{{ t('End') }}:</span> {{ date_day_string($course->end_date) }}
                    </div>
                    <div class="card-text">
                        <span class="fw-bold">{{ t('Schedule') }}:</span> {{ $course->schedule_details }}
                    </div>
                    <div class="card-text">
                        <span class="fw-bold">{{ t('Language') }}:</span> {{ $course->language }}
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
                    <div class="card-text text-left mb--20">
                        {{ $course->objectives }}
                    </div>
                    @if(isset($course->registration_start_date) && isset($course->registration_end_date))
                    <div class="card-text mb--20">
                        <span class="fw-bold">{{ t('Registration Start') }}:</span> {{ date_day_string($course->registration_start_date) }}<br>
                        <span class="fw-bold">{{ t('Registration End') }}:</span> {{ date_day_string($course->registration_end_date) }}
                    </div>
                    @endif
                    <div class="card-text d-flex justify-content-evenly">
                    @isset($course->registration_url)
                    <a href="{{ $course->registration_url }}" target="_blank" class="btn btn-primary">{{ t('Register') }}</a>
                    @endisset
                    @isset($course->syllabus_url)
                        <a href="{{ $course->syllabus_url }}" target="_blank" class="btn btn-primary">{{ t('Syllabus') }}</a>
                    @endisset
                    </div>
                </div>
            </div><!-- card -->
        </div><!-- flip card back -->
    </div><!-- flip card inner -->
</div><!-- flip card -->
