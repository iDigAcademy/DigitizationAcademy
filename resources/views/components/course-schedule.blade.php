<div class="row">
    <div class="col-6 m-auto">
        <div class="d-flex schedule-table justify-content-between align-items-center pt-4 pb-4">
            <ul class="list-unstyled text-start mb-0">
                <li>{{ $event->formattedStartDate }} - {{ $event->formattedEndDate }}</li>
                <li>{{ $event->schedule }}</li>
            </ul>
            <ul class="list-unstyled text-end mb-0">
                <x-course-schedule-dates :course="$course" :event="$event" />
            </ul>
        </div>
    </div>
</div>
