@if(isset($course->registration_start_date) && isset($course->registration_end_date))
    @php
        $nowLtEndDate = \Carbon\Carbon::now()->lessThan($course->registration_end_date);
        $nowGtEndDate = \Carbon\Carbon::now()->gt($course->registration_end_date);
        $nowBetweenDates = \Carbon\Carbon::now()->between($course->registration_start_date, $course->registration_end_date);
    @endphp

    <div class="card-text mb--20">
        @if($nowBetweenDates)
            <span class="fw-bold">
            {{ !$course->url_type ? t('Registration Start') : t('Application Start') }}:</span>
            {{ date_day_string($course->registration_start_date) }}
            <br>
            <span class="fw-bold">{{ !$course->url_type ? t('Registration End') : t('Application End') }}:</span>
            {{ date_day_string($course->registration_end_date) }}
        @elseif ($nowGtEndDate)
            <span class="fw-bold">{{ !$course->url_type ? t('Registration Closed') : t('Application Closed') }}</span>
        @endif
    </div>

    <div class="card-text d-flex justify-content-evenly">
        @if($course->url_type === 0)
            @if(isset($course->registration_url) && $nowBetweenDates)
                <a href="{{ $course->registration_url }}" target="_blank"
                   class="btn btn-primary">{{ t('Register') }}</a>
            @else
                {{ t('Registration will open about 8 weeks prior to the offering.') }}
            @endif
        @else
            @if(isset($course->registration_url) && $nowBetweenDates)
                <a href="{{ $course->registration_url }}" target="_blank" class="btn btn-primary">{{ t('Apply') }}</a>
            @else
                {{ t('Application will open about 8 weeks prior to the offering.') }}
            @endif
        @endif

        @isset($course->syllabus_url)
            <a href="{{ $course->syllabus_url }}" target="_blank"
               class="btn btn-primary">{{ t('Syllabus') }}</a>
        @endisset
    </div>
@else
    @if(\Carbon\Carbon::now()->gt($course->end_date))
        {{ !$course->url_type ? t('Registration Closed') : t('Application Closed') }}
    @else
        {{ $course->url_type ?
            t('Registration will open about 8 weeks prior to the offering.') :
            t('Application will open about 8 weeks prior to the offering.') }}
    @endif
@endif
