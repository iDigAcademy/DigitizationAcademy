<div class="col-12 col-sm-6">
    <div class="card bg-dark h-100 mx-3">
        <div class="row no-gutters">
            <div class="col-md-2 col-12"
                 style="background-image: url('{{ $event->course->present()->tileImage() }}');
                 background-size: cover;
                    background-position: center;
                    min-height: 100px;
                    border-top-left-radius: 8px;
                    border-bottom-left-radius: 8px;
                    overflow: hidden;">
            </div>
            <div class="col-md-10 pl-sm-0 pl-4">
                <div class="card-body">
                    <div class="card-top">
                        <a href="{{ route('course.index', ['slug' => $event->course->slug]) }}">
                            <h4 class="text-light">
                                <span class="info-tooltip">
                                {{ $event->course->title }}
                                <span class="tooltip-text card-title">
                                    Click for course page.
                                </span>
                                </span>
                            </h4>
                        </a>
                    </div>
                    <div class="card-mid">
                        <p class="subtitle text-rose mt-3 mb-3">Description</p>
                        <p class="small">{{ $event->course->description }}</p>
                    </div>
                    <div class="row card-foot">
                        <div class="col-md-5 course-dates p-0">
                            <ul class="list-unstyled m-0">
                                <li><span>Start Date:&nbsp;</span>{{ $event->formatted_start_date }} </li>
                                <li><span>End Date:&nbsp;</span>{{ $event->formatted_end_date }}</li>
                            </ul>
                        </div>
                        <div class="col-md-7 course-dates">
                            <ul class="list-unstyled m-0">
                                <li><span>Schedule:&nbsp;</span>{{ $event->schedule }}</li>
                                <li><span>Language:&nbsp;</span>{{ $event->course->language }}</li>
                            </ul>
                        </div>
                        <x-course-tile-dates :event="$event"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>