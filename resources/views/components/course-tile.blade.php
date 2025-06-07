<div class="col-12 col-sm-6">
    <div class="card bg-dark h-100 mx-3">
        <div class="row no-gutters">
            <div class="col-md-2 col-12"
                 style="background-image: url('{{ $event->course->present()->tile_image }}');
                 background-size: cover;
                    background-position: center;
                    min-height: 100px;">
            </div>
            <div class="col-md-10 pl-sm-0 pl-4">
                <div class="card-body">
                    <div class="card-top">
                        <a href="{{ route('course.index', ['slug' => $event->course->slug]) }}">
                            <h4 class="text-light">
                                {{ $event->course->title }}
                            </h4>
                        </a>
                    </div>
                    <div class="card-mid">
                        <p class="subtitle text-rose mt-3 mb-3">Description</p>
                        <p class="small">{{ $event->course->description }}</p>
                    </div>
                    <div class="row card-foot">
                        <div class="col-md-5 course-dates">
                            <ul class="list-unstyled m-0">
                                <li><span>Start Date:</span>{{ $event->formatted_start_date }} </li>
                                <li><span>End Date:</span> {{ $event->formatted_end_date }}</li>
                            </ul>
                        </div>
                        <div class="col-md-7 course-dates">
                            <ul class="list-unstyled m-0">
                                <li><span>Schedule:</span> {{ $event->schedule }}</li>
                                <li><span>Language:</span> {{ $event->course->language }}</li>
                            </ul>
                        </div>
                        <div class="d-flex mt-4 justify-content-between align-items-center">
                            <x-course-tile-dates :event="$event" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>