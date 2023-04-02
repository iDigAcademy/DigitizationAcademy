@if (\Carbon\Carbon::now()->lessThan($course->start_date))
    <div class="card-text">
        <span class="fw-bold">{{ t('Start') }}:</span>{{ date_day_string($course->start_date) }}<br>
        <span class="fw-bold">{{ t('End') }}:</span>{{  date_day_string($course->end_date) }}
    </div>
    <div class="card-text">
        <span class="fw-bold">{{ t('Schedule') }}:</span> {{ $course->schedule_details }}
    </div>
    <div class="card-text">
        <span class="fw-bold">{{ t('Language') }}:</span> {{ $course->language }}
    </div>
@elseif (\Carbon\Carbon::now()->between($course->start_date, $course->end_date))
    <div class="card-text">
        <span class="fw-bold"> {{ t('In Progress') }}</span>
    </div>
    <div class="card-text">
        <span class="fw-bold">{{ t('Schedule') }}:</span> {{ $course->schedule_details }}
    </div>
    <div class="card-text">
        <span class="fw-bold">{{ t('Language') }}:</span> {{ $course->language }}
    </div>
@else
    <div class="card-text">
        <span class="fw-bold">{{ t('Completed') }}</span>
    </div>
@endif
