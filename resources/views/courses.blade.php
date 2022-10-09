<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000"
                 data-sal-delay="300">
                <h1 class="title h2">Courses</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
            </div>
            <div class="banner-thumbnail" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="400">
                <img class="paralax-image" src="{{ $topImage }}"
                     alt="Illustration">
            </div>
        </div>
        <ul class="shape-group-8 list-unstyled">
            <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/bubble-9.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                <img src="{{ vite_asset('resources/media/others/bubble-teal-corp.png') }}" alt="Teal Bubble">
            </li>
            <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                <img src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="Line">
            </li>
        </ul>
    </div>


    <!--=====================================-->
    <!--=       Course Cards  Start        =-->
    <!--=====================================-->
    <section class="section section-padding-equal pt--200 pt_md--80 pt_sm--60">
        <div class="container">
            <div class="section-heading heading-left">
                <span class="subtitle">Current Courses</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.</p>
                <h2 class="title">Current / On Demand</h2>

                <div class="isotope-button isotope-project-btn">
                    <button data-filter="*" class=""><span class="filter-text">All Courses</span></button>
                    <button data-filter=".current" class=""><span class="filter-text">Past</span></button>
                    <button data-filter=".ondemand" class="is-checked"><span class="filter-text">Present</span>
                    </button>
                </div>
            </div>

            <!-- Start courses grid -->
            <div class="row row-35 isotope-list courses" style="position: relative; height: 1304px;">

                <!-- course card -->
                <aside class="col-md-6 col-sm-12 current project" style="position: absolute; left: 0%; top: 0px;">
                    <!-- sample card -->
                    <div class="flip-card salanimate" data-sal="slide-up" data-sal-duration="900"
                         data-sal-delay="300">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="card-img-top"
                                     src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                     alt="Card image cap" style="border-radius: 20px;">

                                <div class="card-body">
                                    <h5 class="card-title">Introduction to Biodiversity Specimen Digitization</h5>
                                    <p class="card-text">July 18-21, 2022.</p>

                                </div>
                                <div class="card-footer d-inline-flex justify-content-end align-content-end">
                                    <i class="fa fa-angle-right fa-lg align-content-end"> </i>
                                </div>
                            </div> <!-- flip card front -->

                            <div class="flip-card-back">
                                <div class="shadow-box">
                                    <img class="card-img-top"
                                         src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                         alt="Card image cap" style="border-radius: 20px; max-height: 100px;">
                                    <div class="card-body text-left">
                                        <h5 class="card-title">Objectives</h5>
                                        <p class="text-left">The aims of the course are to empower participants with
                                            the knowledge and skills to (1) identify and describe relevant facets of
                                            information or potential information related to biodiversity specimens,
                                            (2) identify and describe common digitization protocols and best
                                            practices related to transcription, imaging, and georeferencing, (3)
                                            identify downstream uses that are relevant to digitization
                                            decision-making, (4) recognize basic principles of data management
                                            including the importance of identifiers, (5) identify collections
                                            management system (CMS) options and the major differences among them,
                                            and (6) outline a digitization project, including quality control and a
                                            data management plan that includes data sharing.</p>
                                    </div>
                                    <div class="card-footer d-inline-flex">
                                        <a href="#" class="btn btn-primary">Register</a>
                                    </div>
                                </div><!-- card -->
                            </div><!-- flip card back -->
                        </div><!-- flip card inner -->
                    </div><!-- flip card -->
                </aside>

                <!-- course card -->
                <aside class="col-md-6 col-sm-12 project ondemand" style="position: absolute; left: 0%; top: 0px;">
                    <!-- sample card -->
                    <div class="flip-card salanimate" data-sal="slide-up" data-sal-duration="900"
                         data-sal-delay="300" style=" ">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="card-img-top"
                                     src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                     alt="Card image cap" style="border-radius: 20px;">

                                <div class="card-body">
                                    <h5 class="card-title">Introduction to Biodiversity Specimen Digitization</h5>
                                    <p class="card-text">July 18-21, 2022.</p>

                                </div>
                                <div class="card-footer d-inline-flex justify-content-end align-content-end">
                                    <i class="fa fa-angle-right fa-lg align-content-end"> </i>
                                </div>
                            </div> <!-- flip card front -->

                            <div class="flip-card-back">
                                <div class="shadow-box">
                                    <img class="card-img-top"
                                         src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                         alt="Card image cap" style="border-radius: 20px; max-height: 100px;">
                                    <div class="card-body text-left pt-lg-3">
                                        <h5 class="card-title">Objectives</h5>
                                        <p class="text-left">
                                        <p>This course is targeted at those already associated with a biodiversity
                                            collection, such as student technicians, collections management
                                            professionals, or curators. The course will be relevant to a diversity
                                            of collection types. Participants do not need prior knowledge of
                                            biodiversity informatics or specialized software.</p>
                                        <p>The course includes a conversation with representatives from the major
                                            CMS projects.</p>
                                    </div>

                                    <div class="card-footer d-inline-flex">
                                        <a href="#" class="btn btn-primary">Register</a>
                                    </div>
                                </div><!-- card -->
                            </div><!-- flip card back -->
                        </div><!-- flip card inner -->
                    </div><!-- flip card -->
                </aside>

                <!-- course card -->
                <aside class="col-md-6 col-sm-12 project ondemand" style="position: absolute; left: 0%; top: 0px;">
                    <!-- sample card -->
                    <div class="flip-card salanimate" data-sal="slide-up" data-sal-duration="900"
                         data-sal-delay="300">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="card-img-top"
                                     src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                     alt="Card image cap" style="border-radius: 20px;">

                                <div class="card-body">
                                    <h5 class="card-title">3. Introduction to Biodiversity Specimen
                                        Digitization</h5>
                                    <p class="card-text">July 18-21, 2022.</p>
                                </div>
                                <div class="card-footer d-inline-flex justify-content-end align-content-end">
                                    <i class="fa fa-angle-right fa-lg align-content-end"> </i>
                                </div>
                            </div> <!-- flip card front -->

                            <div class="flip-card-back">
                                <div class="shadow-box">
                                    <img class="card-img-top"
                                         src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                         alt="Card image cap" style="border-radius: 20px; max-height: 100px;">
                                    <div class="card-body text-left">
                                        <h5 class="card-title">Objectives</h5>
                                        <p class="text-left">The aims of the course are to empower participants with
                                            the knowledge and skills to (1) identify and describe relevant facets of
                                            information or potential information related to biodiversity specimens,
                                            (2) identify and describe common digitization protocols and best
                                            practices related to transcription, imaging, and georeferencing, (3)
                                            identify downstream uses that are relevant to digitization
                                            decision-making, (4) recognize basic principles of data management
                                            including the importance of identifiers, (5) identify collections
                                            management system (CMS) options and the major differences among them,
                                            and (6) outline a digitization project, including quality control and a
                                            data management plan that includes data sharing. The course includes a
                                            conversation with representatives from the major CMS projects.</p>
                                    </div>
                                    <div class="card-footer d-inline-flex">
                                        <a href="#" class="btn btn-primary">Register</a>
                                    </div>
                                </div><!-- card -->
                            </div><!-- flip card back -->
                        </div><!-- flip card inner -->
                    </div><!-- flip card -->
                </aside>

                <!-- course card -->
                <aside class="col-md-6 col-sm-12 project ondemand" style="position: absolute; left: 0%; top: 0px;">
                    <!-- sample card -->
                    <div class="flip-card salanimate" data-sal="slide-up" data-sal-duration="900"
                         data-sal-delay="300">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img class="card-img-top"
                                     src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                     alt="Card image cap" style="border-radius: 20px;">

                                <div class="card-body">
                                    <h5 class="card-title">4. Introduction to Biodiversity Specimen
                                        Digitization</h5>
                                    <p class="card-text">July 18-21, 2022.</p>
                                </div>
                                <div class="card-footer d-inline-flex justify-content-end align-content-end">
                                    <i class="fa fa-angle-right fa-lg align-content-end"> </i>
                                </div>
                            </div> <!-- flip card front -->

                            <div class="flip-card-back">
                                <div class="shadow-box">
                                    <img class="card-img-top"
                                         src="{{ vite_asset('resources/media/project/project-4.png') }}"
                                         alt="Card image cap" style="border-radius: 20px; max-height: 100px;">
                                    <div class="card-body text-left">
                                        <h5 class="card-title">Objectives</h5>
                                        <p class="text-left">The aims of the course are to empower participants with
                                            the knowledge and skills to (1) identify and describe relevant facets of
                                            information or potential information related to biodiversity specimens,
                                            (2) identify and describe common digitization protocols and best
                                            practices related to transcription, imaging, and georeferencing, (3)
                                            identify downstream uses that are relevant to digitization
                                            decision-making, (4) recognize basic principles of data management
                                            including the importance of identifiers, (5) identify collections
                                            management system (CMS) options and the major differences among them,
                                            and (6) outline a digitization project, including quality control and a
                                            data management plan that includes data sharing. The course includes a
                                            conversation with representatives from the major CMS projects.</p>
                                    </div>
                                    <div class="card-footer d-inline-flex">
                                        <a href="#" class="btn btn-primary">Register</a>
                                    </div>
                                </div><!-- card -->
                            </div><!-- flip card back -->
                        </div><!-- flip card inner -->
                    </div><!-- flip card -->
                </aside>
            </div><!-- row -->
        </div><!-- container -->

        <ul class="shape-group-6 list-unstyled">
            <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="800"
                data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/bubble-7.png') }}" id="leftBackLeaf"
                     alt="Digitization Academy Symbol"
                     data-sal="slide-right" data-sal-duration="500" data-sal-delay="600"></li>
            <li style="margin-bottom:40px;"></li>
        </ul>

        <ul class="list-unstyled shape-group-10">
            <li class="shape shape-4"><img src="{{ vite_asset('resources/media/others/bubble-3.png') }}"
                                           style="opacity:.1" alt="Line">
            </li>
            <li class="shape shape-4"><img src="{{ vite_asset('resources/media/others/line-5.png') }}" alt="line"
                                           style="z-index: -1" ;>
            </li>
        </ul>

    </section>
</x-app-layout>
