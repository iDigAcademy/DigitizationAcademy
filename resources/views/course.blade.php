<x-app-layout>
    <!--              Hero Banner            -->
    <section class="banner course bg-dark">
        <div class="container-fluid">
            <div class="breadcrumb">
                <ul class="list-unstyled">
                    <li class="course"><a href="{{ route('home') }}">Home</a></li>
                    <li class="course"><a href="{{ route('catalog.index') }}">Course Catalog</a></li>
                    <li class="active">{{ $course->title }}</li>
                </ul>
            </div>

            <div class="banner-content">
                <h1 class="course-title mb-4">{{ $course->title }}</h1>
                <p class="course-lead">{{ $course->description }}</p>
                <p>Led by {{ $course->instructor }}</p>
                <p class="mt-5">Next
                    offering: {{ $buttonDate ? $course->events->first()->formattedStartDate : 'Coming soon' }} </p>
                <p class="course-info mt-5">{{ $course->type }} course | Online | Free
                    <span class="info-tooltip">
                        <i class="far fa-info-circle"></i>
                        <span class="tooltip-text">
                            Course fees underwritten by the National Science Foundation.
                        </span>
                    </span> | Offered in {{ $course->language }}
                    {{ $buttonDate ? '| <span class="text-rose">'.$course->type === '2 Hour' ? 'Register</span>' : 'Apply</span>' : '' }}
                </p>
            </div>

            <!-- graphic shapes -->
            <ul class="list-unstyled shape-group-18">
                <li class="shape shape-1" style="z-index: -1;">
                    <img src="{{ $course->present()->page_image }}" style="z-index: -1" alt="Header image for course">
                </li>
            </ul>

        </div><!-- container -->
    </section>

    <!--    Tab Nav       -->
    <section class="section section-padding-equal faq-area">
        <div class="container">
            <div class="row text-center">
                <ul class="nav nav-pills mb-5 justify-content-center" id="course-nav" role="tablist">
                    @if($course->type === '12 Hour')
                        <x-course-button class="active" value="objectives"/>
                        <x-course-button value="syllabus"/>
                    @endif

                    <x-course-button class="{{ $course->type === '2 Hour' ? 'active' : '' }}" value="schedule"/>
                    <x-course-button value="expert-panel"/>

                    @if($course->assets && $course->assets->isNotEmpty())
                        <x-course-button value="resources"/>
                    @endif

                    @if($course->type === '2 Hour' && !empty($course->video))
                        <x-course-button value="video"/>
                    @endif
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    @if($course->type === '12 Hour')
                        <div class="tab-pane fade show active" id="objectives" role="tabpanel"
                             aria-labelledby="objectives-tab">
                            <div class="section-heading course d-flex flex-column align-items-center">
                                <x-course-objective-header :language="$course->language"/>
                                <ul class="course-objectives list-unstyled text-start">
                                    @foreach(array_filter(explode(PHP_EOL, $course->objectives)) as $line)
                                        <li>{{ $line }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endisset

                    <div class="tab-pane fade {{ $course->type === '2 Hour' ? 'show active': '' }}"
                         id="schedule"
                         role="tabpanel"
                         aria-labelledby="schedule-tab">
                        <div class="section-heading course">
                            @if($course->events && $course->events->isNotEmpty())
                                @foreach($course->events as $event)
                                    <x-course-schedule :course="$course" :event="$event"/>
                                @endforeach
                            @else
                                No schedule available.
                            @endif
                        </div>
                    </div>

                    @if($course->type === '12 Hour')
                        <div class="tab-pane fade" id="syllabus" role="tabpanel" aria-labelledby="syllabus-tab">
                            <div class="section-heading course" style="margin-bottom: 10px;">
                                <p class="subtitle text-rose text-center">Sample Syllabus</p>
                                <object data="{{ $course->present()->syllabus }}"
                                        type="application/pdf"
                                        width="100%" height="600px">
                                    <p>Your browser does not support embedded PDFs.
                                        <a href="{{ $course->present()->syllabus }}">
                                            Click here to download the PDF
                                        </a>
                                    </p>
                                </object>
                            </div>
                        </div>
                    @endif

                    <div class="tab-pane fade"
                         id="expert-panel"
                         role="tabpanel"
                         aria-labelledby="expert-panel-tab">
                        <div class="section-heading course">
                            <span class="subtitle text-rose">
                                Introducing you to the people behind the projects.</span>
                            <p>This course provides the opportunity to engage with a panel of experts representing
                                different collection management systems.</p>
                            <div class="expert-logos">
                                <div class="footer-social-link pt-3 mt-4">
                                    <!-- sponsor logos -->
                                    <ul class="list-unstyled">
                                        <li><a href="#" target="_blank">
                                                <img src="{{ asset('images/logo/Asset20.png') }}"
                                                     alt="Arctos"
                                                     width="175px" style="filter:grayscale(99%);"></a></li>
                                        <li><a href="#" target="_blank">
                                                <img src="{{ asset('images/logo/Asset21.png') }}"
                                                        alt="Axiel"
                                                        style="z-index:1; display:block; position: relative;"
                                                        width="175px"></a></li>
                                        <li><a href="#" target="_blank">
                                                <img src="{{ asset('images/logo/Asset22.png') }}"
                                                     style="z-index:1; display:block; position: relative;"
                                                     alt="Specify"
                                                     width="175px"></a></li>
                                        <li><a href="#" target="_blank">
                                                <img src="{{ asset('images/logo/Asset23.png') }}" alt="Symbiota"
                                                     style="z-index:1; display:block; position: relative;"
                                                     width="175px"></a>
                                        </li>
                                        <li><a href="#" target="_blank">
                                                <img src="{{ asset('images/logo/Asset24.png') }}" alt="TaxonWorks"
                                                     style="z-index:1; display:block; position: relative;"
                                                     width="175px"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($course->assets && $course->assets->isNotEmpty())
                        <div class="tab-pane fade" id="resources" role="tabpanel" aria-labelledby="resources-tab">
                            <div class="col-10 m-auto">
                                <div class="row course-resources">
                                    <div class="col-md-6 ps-5">
                                        <img src="{{ asset('images/logo/dk-logo.svg') }}"
                                             alt="Digitizaion Knowledgebase Logo"
                                             class="img-fluid d-block"/>
                                        <p class="text-start mt-5">
                                            Explore topics covered in this course through the Digitization
                                            Knowledgebase, a curated navigation tool for digitization resources from
                                            across the world. The Digitization Knowledgebase provides links to relevant content, organized by topic for easy exploration.
                                        </p>
                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <ul class="nav nav-pills flex-column w-100">
                                            @foreach($course->assets as $asset)
                                                <x-assets :asset="$asset"/>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($course->type === '2 Hour' && !empty($course->video))
                        <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                        <span class="subtitle text-rose mb-5">
                            Recordings of this and all our 2-hour courses are available on
                            <a href="{{ $course->video }}" target="_blank">Vimeo</a>
                        </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <x-course-sections/>
</x-app-layout>
