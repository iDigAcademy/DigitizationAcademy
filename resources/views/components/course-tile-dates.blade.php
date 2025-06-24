@php
    $courseCompleteDate = \Carbon\Carbon::now()->gt($event->end_date);
    $nowLtRegisterEndDate = \Carbon\Carbon::now()->lessThan($event->form_start_date);
    $nowGtEndDate = \Carbon\Carbon::now()->gt($event->form_end_date);
    $nowBetweenDates = \Carbon\Carbon::now()->between($event->form_start_date, $event->form_end_date);
    $inProgressDate = \Carbon\Carbon::now()->between($event->start_date, $event->end_date);
@endphp
<div class="d-flex justify-content-between align-items-center mt-4 ps-0 w-100">
<!-- 2 hour === Register, 12 hour === Apply -->
@if($courseCompleteDate)
    <p class="my-auto">Course complete.</p>
@elseif($nowLtRegisterEndDate)
    <p class="my-auto">
        <span class="text-rose">
        {{ $event->course->type == '2 Hour' ? 'Registration opens' : 'Application opens' }}:&nbsp;
        </span> {{ date_day_string($event->form_start_date) }}
    </p>
@elseif($nowBetweenDates)
    <p class="my-auto">
        <span class="text-rose">
            {{ $event->course->type == '2 Hour' ? 'Registration closes' : 'Application closes' }}:&nbsp;
        </span> {{ date_day_string($event->form_end_date) }}
    </p>
    <a href="{{ $event->form_link }}" target="_blank" class="digi-btn btn-fill-primary course text-center my-auto">
        {{ $event->course->type == '2 Hour' ? 'Register' : 'Apply' }}
    </a>
@elseif ($nowGtEndDate)
    <p class="my-auto">
        @if($inProgressDate)
            In Progress.
        @else
        {{ $event->course->type == '2 Hour' ? 'Registration closed' : 'Application closed' }}.
        @endif
    </p>
@endif
</div>