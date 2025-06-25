<div class="col-12 col-sm-6">
    <div class="card bg-dark h-100 mx-3">
        <div class="row no-gutters">
            <div class="col-md-2 col-12"
                 style="background-image: url('{{ $course->present()->tileImage() }}');
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
                        <a href="{{ route('course.index', ['slug' => $course->slug]) }}">
                            <h4 class="text-light">
                                <span class="info-tooltip">
                                {{ $course->title }}
                                <span class="tooltip-text card-title">
                                    Click for course page.
                                </span>
                                </span>
                            </h4>
                        </a>
                    </div>
                    <div class="card-mid">
                        <p class="subtitle text-rose mt-3 mb-3">Objectives</p>
                        <p class="small">{{ $course->present()->objectivesOrDescription() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>