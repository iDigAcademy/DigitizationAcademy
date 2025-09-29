@php
    $nowLtRegisterEndDate = \Carbon\Carbon::now()->lessThan($event->form_start_date);
    $nowGtEndDate = \Carbon\Carbon::now()->gt($event->form_end_date);
    $nowBetweenDates = \Carbon\Carbon::now()->between($event->form_start_date, $event->form_end_date);
@endphp
        <!-- 2 hour === Register, 12 hour === Apply -->
@if($nowLtRegisterEndDate)
    <li>{{ $course->course_type_id == 1 ? 'Registration opens' : 'Application opens' }}:
        {{ date_day_string($event->form_start_date) }}
    </li>
@elseif($nowBetweenDates)
    <li>
        <a href="{{ $event->form_link }}" class="digi-btn btn-fill-primary course text-center">
            {{ $course->course_type_id == 1 ? 'Register' : 'Apply' }}
        </a>
    </li>
    <li>Application closes: {{ $event->form_end_date->format('F j, Y')}}</li>
@elseif ($nowGtEndDate)
    <li>{{ $course->course_type_id == 1 ? 'Registration closed' : 'Application closed' }}.</li>
@endif

