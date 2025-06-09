@php
    $nowLtRegisterEndDate = \Carbon\Carbon::now()->lessThan($event->form_start_date);
    $nowGtEndDate = \Carbon\Carbon::now()->gt($event->form_end_date);
    $nowBetweenDates = \Carbon\Carbon::now()->between($event->form_start_date, $event->form_end_date);
@endphp
        <!-- 2 hour === Register, 12 hour === Apply -->
@if($nowLtRegisterEndDate)
    <li>{{ $course->type == '2 Hour' ? 'Registration opens' : 'Application opens' }}:
        {{ date_day_string($event->form_start_date) }}
    </li>
@elseif($nowBetweenDates)
    <li>
        <a href="{{ route('course.index', ['slug' => $course->slug]) }}" class="digi-btn btn-fill-primary course text-center">
            {{ $course->type == '2 Hour' ? 'Register' : 'Apply' }}
        </a>
    </li>
@elseif ($nowGtEndDate)
    <li>{{ $course->type == '2 Hour' ? 'Registration closed' : 'Application closed' }}</li>
@endif

