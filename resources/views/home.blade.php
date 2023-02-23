<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <section class="banner banner-style-2">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content" data-sal="slide-up" data-sal-duration="1000"
                         data-sal-delay="100">
                        <h1 class="title mb-2">{{ t('Explore. Discover. Connect.') }}</h1>
                        <h6 class="text-light text">{{ t('Catalyzing excellence in the creation of digital data about biodiversity.') }}</h6>

                        <a href="#homePhilosophy" class="axil-btn btn-fill-white btn-large">{{ t('Read More') }} &nbsp; <i
                                class="fas fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-unstyled shape-group-18">
            <li class="shape shape-1" data-sal="slide-left" data-sal-duration="1000" data-sal-delay="100"
                style="top:-1px;"><img src="{{ $topImage }}"
                                       alt="Butterfly Specimen"></li>
            <li class="shape shape-2" data-sal="slide-right" data-sal-duration="1000" data-sal-delay="100"><img
                    src="{{ $bottomImage }}" alt="Shape"></li>
            <li class="shape shape-3 sal-animate" data-sal="zoom-in" data-sal-duration="500"
                data-sal-delay="600"
                style="opacity:.22;"><img src="{{ vite_asset('resources/media/others/bubble-16.png') }}"
                                          alt="Shape"></li>
            <li class="shape shape-4 sal-animate" data-sal="zoom-in" data-sal-duration="500"
                data-sal-delay="600"
                style="opacity:.1"><img src="{{ vite_asset('resources/media/others/bubble-15.png') }}"
                                        alt="Shape">
            </li>
            <li class="shape shape-5 sal-animate" data-sal="zoom-in" data-sal-duration="500"
                data-sal-delay="600"
                style="opacity:.05"><img src="{{ vite_asset('resources/media/others/bubble-14.png') }}"
                                         alt="Shape">
            </li>
            <li class="shape shape-6 sal-animate" data-sal="zoom-in" data-sal-duration="500"
                data-sal-delay="600"
                style="opacity:.05"><img src="{{ vite_asset('resources/media/others/bubble-16.png') }}"
                                         alt="Shape">
            </li>
            <li class="shape shape-7 sal-animate" data-sal="slide-down" data-sal-duration="500"
                data-sal-delay="600"
                style="opacity:.7"><img src="{{ vite_asset('resources/media/others/bubble-26.png') }}"
                                        alt="Shape">
            </li>
        </ul>
    </section>


    <!--=====================================-->
    <!--    accordion approach 3 Tiers       -->
    <!--=====================================-->
    <a name="homePhilosophy"> </a>
    <section class="section section-padding-equal bg-color-light faq-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-4">
                    <div class="section-heading heading-left">
                        <span class="subtitle">{{ t('A strategy built for you') }}</span>
                        <h3 class="title">{{ t('Our Approach') }}</h3>
                        <p>{{ t('Our offerings combine these three elements to level you up on a topic. We aim to provision you with more than an academic understanding. Leave the course with new inspiration and connections to a cohort of professionals from around the world who are tackling the same challenges.') }}</p>
                    </div>
                </div>

                <div class="col-lg-7 col-xl-8">
                    <div class="faq-accordion">
                        <div class="accordion" id="accordion">

                            <div class="accordion-item" data-sal="zoom-in" data-sal-duration="1000"
                                 data-sal-delay="100">
                                <h6 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq1" aria-expanded="false" aria-controls="faq1">
                                        <span class="acc_number"><img
                                                src="{{ vite_asset('resources/media/logos/leaf-left.svg') }}"
                                                width="100px" style="margin-top: -25px;"> </span>
                                        <h6>{{ t('Our systematic overview builds the foundation.') }}</h6>
                                    </button>
                                </h6>

                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>{{ t('We deliver content featuring major dimensions of a topic in engaging ways. All content advances a core set of carefully curated learning objectives.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-sal="slide-left" data-sal-duration="1000"
                                 data-sal-delay="100">
                                <h6 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                        <span class="acc_number"><img
                                                src="{{ vite_asset('resources/media/logos/leaf-yellow-orange-center.png') }}"
                                                width="100px"
                                                style="margin-top: -25px;"> </span>
                                        <h6>{{ t('Your experience provides the nuance and motivation.') }}</h6>
                                    </button>
                                </h6>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>{{ t('We aspire to create a learning community with each offering where you feel empowered to share your experience for everyone’s enrichment.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-sal="slide-right" data-sal-duration="900"
                                 data-sal-delay="900">
                                <h6 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                        <span class="acc_number"><img
                                                src="{{ vite_asset('resources/media/logos/leaf-right.svg') }}"
                                                width="100px" style="margin-top: -25px;"> </span>
                                        <h6>{{ t('And an expert panel identifies the leading edge of the possible.') }}</h6>
                                    </button>
                                </h6>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>{{ t('We feature thought leaders or tool providers who share their latest developments on the topic and address questions from participants.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="shape-group-6 list-unstyled">
            <li class="shape shape-2 sal-animate" data-sal="slide-down" data-sal-duration="800"
                data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="line" style="z-index: -1">
            </li>
            <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="800"
                data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/bubble-7.png') }}" alt="Bubble"
                     style="z-index: 1;width: 1050px; margin-left: -315px;opacity: .75;"></li>
            <li style="margin-bottom:40px;"></li>
        </ul>
        <ul class="shape-group-1 list-unstyled">
            <li class="shape shape-2"><img src="{{ vite_asset('resources/media/others/bubble-23.png') }}"
                                           alt="Bubble"></li>
        </ul>
    </section>


    <!--=====================================-->
    <!--=        Experience Counts Banner   =-->
    <!--=====================================-->
    <section class="section section-padding-equal bg-color-dark">
        <div class="container">

            <div class="section-heading heading-light-left">
                <span class="subtitle">{{ t('Built on iDigBio’s professional development experience.') }}</span>
                <h2 class="title">{{ t('Deep experience with digitization and training.') }}</h2>
                <p>{{ t('Since its founding in 2012, iDigBio has offered over 100 training opportunities, and many
                    involved the Digitization Academy’s core staff. iDigBio is the US National Science Foundation’s
                    National Resource for Advancing Digitization of Biodiversity Collections and home to the Digitization
                    Academy. The Digitization Academy offerings from iDigBio represent a standardized strategy
                    for delivery of a subset of iDigBio’s training options to ensure that we have all high-value
                    topics covered for you in complementary ways.') }}</p>
            </div>
        </div> <!-- container -->

        <ul class="list-unstyled shape-group-9 overview">
            <li class="shape shape-1"></li>
            <li class="shape shape-2"><img src="{{ vite_asset('resources/media/others/bubble-16.png') }}"
                                           style="opacity:.05" alt="Comments">
            </li>
            <li class="shape shape-3"><img src="{{ vite_asset('resources/media/others/bubble-13.png') }}"
                                           style="opacity:.05" alt="Comments">
            </li>

            <li class="shape shape-4"><img src="{{ vite_asset('resources/media/others/bubble-14.png') }}"
                                           style="opacity:.05" alt="Comments">
            </li>
            <li class="shape shape-5"><img src="{{ vite_asset('resources/media/others/bubble-16.png') }}"
                                           style="opacity:.05" alt="Comments">
            </li>
            <li class="shape shape-6"><img src="{{ vite_asset('resources/media/others/bubble-15.png') }}"
                                           style="opacity:.05" alt="Comments">
            </li>
            <li class="shape shape-7"><img src="{{ vite_asset('resources/media/others/bubble-16.png') }}"
                                           style="opacity:.05" alt="Comments">
            </li>
        </ul>
        <ul class="list-unstyled shape-group-10">
            <li class="shape shape-1"><img src="{{ vite_asset('resources/media/others/bubble-15.png') }}"
                                           style="opacity:.1" alt=" O "></li>

            <li class="shape shape-3"><img src="{{ vite_asset('resources/media/others/bubble-5.png') }}"
                                           alt="line"
                                           style="opacity:.1"></li>
        </ul>
        <img src="{{ vite_asset('resources/media/logos/idig-bio-leaves.svg') }}" id="idigLeaf" alt="Comments">
    </section>


    <!--=====================================-->
    <!--=     Call To Action Area Start     =-->
    <!--=====================================-->
    <section class="section section-padding pb--70">
        <article class="container pb--70">
            <div class="text-dark row pt-1" style="text-align: center">
                <div class="mt-2">
                    <span class="subtitle-right">{{ t('Connecting you with resources for success.') }}</span>
                    @isset($course)
                    <h2 class="title">{!! t('Courses like this one introduce you<br>to the people behind the projects.') !!}</h2>

                    <div class="d-flex justify-content-center course-row">
                        <!-- sample flip card -->
                        <div class="flip-card salanimate banner-form"
                             style="display: -webkit-box; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-box-pack: end; -webkit-justify-content: flex-end; -ms-flex-pack: end; display-content: flex-end;"
                             data-sal="slide-up" data-sal-duration="900" data-sal-delay="300">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <div class="card shadow-box">
                                        <img class="card-img-top"
                                             src="{{ $course->present()->front_image }}"
                                             alt="Card image cap" style="border-radius: 20px;">
                                        <div class="card-body pb-0">
                                            <h4 class="card-title">{{ $course->title }}</h4>
                                            <div class="card-text">
                                                Start: {{ date_day_string($course->start_date) }}<br>
                                                End: {{ date_day_string($course->end_date) }}
                                            </div>
                                            <div class="card-text">
                                                {{ $course->schedule_details }}
                                            </div>
                                        </div>
                                    </div><!-- card -->
                                </div> <!-- card front -->

                                <div class="flip-card-back">
                                    <div class="card shadow-box">
                                        <img class="card-img-top"
                                             src="{{ $course->present()->back_image }}"
                                             alt="Card image cap"
                                             style="border-radius: 20px; max-height: 100px;">
                                        <div class="card-body text-left">
                                            <h5 class="card-title">{{ t('Objectives') }}</h5>
                                            <p class="text-left mb-0">{{ $course->objectives }}</p>
                                            <a href="#" class="btn btn-primary">{{ t('Learn More') }}</a>
                                        </div>
                                    </div><!-- card -->
                                </div><!-- flip card back -->
                            </div><!-- flip card inner -->
                        </div><!-- flip card -->
                    </div>
                    @endisset
                </div>
            </div>
        </article>
        <aside class="container-fluid">
            <div class="footer-social-link mt-5 px-md-4">
                <!-- cms logos -->
                <ul class="list-unstyled px-5">
                    <li><a href="https://idigbio.edu/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="100"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-arctos.png') }}" alt="Arctos"
                                width="115px"></a></li>

                    <li><a href="https://idigbio.edu.com/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="200"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-axiell.png') }}" alt="Axiell"
                                width="115px"></a></li>

                    <li><a href="https://www.fsu.com/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="300"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-brahms.png') }}" alt="Brahms"
                                width="100px"></a></li>

                    <li><a href="https://idigbio.edu/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="100"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-collection-space.png') }}"
                                alt="Collection Space"
                                width="115px"></a></li>

                    <li><a href="https://www.linkedin.com/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="400"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-earthcape.png') }}"
                                alt="Earth Cape"
                                width="115px"></a></li>

                    <li><a href="https://idigbio.edu.com/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="200"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-scc.png') }}" alt="SCC"
                                width="115px"></a>
                    </li>

                    <li><a href="https://idigbio.edu/" data-sal="slide-up" data-sal-duration="500"
                           data-sal-delay="100"><img
                                src="{{ vite_asset('resources/media/logos/cms/logo-symbiota.png') }}"
                                alt="Symbiota"
                                width="115px"></a>
                    </li>
                </ul>
            </div>

        </aside>
        <ul class="shape-group-20 list-unstyled">
            <li class="shape shape-2"><img src="{{ vite_asset('resources/media/others/bubble-23.png') }}"
                                           alt="Bubble"></li>
            <li class="shape shape-4"><img src="{{ vite_asset('resources/media/others/line-5.png') }}"
                                           alt="Line">
            </li>
            <li class="shape shape-5"><img src="{{ vite_asset('resources/media/others/line-4.png') }}"
                                           alt="Line">
            </li>
            <li class="shape shape-6"><img src="{{ vite_asset('resources/media/others/line-6.png') }}"
                                           alt="Line">
            </li>
            <li class="shape shape-1"><img src="{{ vite_asset('resources/media/others/bubble-26.png') }}"
                                           style="filter:grayscale(99%); opacity: .15;" alt="Bubble"></li>
        </ul>
        <ul class="shape-group-6 list-unstyled">
            <li class="shape shape-2 sal-animate" data-sal="slide-down" data-sal-duration="800"
                data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="line" style="z-index:-1">
            </li>
        </ul>
    </section>


    <!--=====================================-->
    <!--=        Testimonial Area Start     =-->
    <!--=====================================-->
    <section class="bg-dark mb-4 section section-padding pb--70">
        <article class="container pb--70">
            <div class="section-heading heading-left">
                <span class="subtitle">{{ t('What participants are saying.') }}</span>
                <h2 class="title text-light">{{ t('Evaluations help us further refine our courses with each iteration.') }}</h2>
                <p></p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">
                    <div class="testimonial-grid">
                        <p class="text-light text-justify fst-italic">{{ t('Topics were discussed in great detail. The instructors were very
                            helpful and enthusiastic in answering queries and sharing resources. The activities were
                            practical in that the questions were centered around our individual research.') }}</p>
                    </div>
                </div>

                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200">
                    <div class="testimonial-grid active text-light">
                        <p class="text-light text-justify fst-italic">{{ t('This was a really well-put-together class that took
                            us through the various steps and details of a collection digitization project. Great
                            use of technology, easy to follow, well documented, and well-thought exercises. I am a big
                            fan of audience participation, and that was well done. Highly knowledgeable instructors
                            too. Austin is skilled at conveying technical relationships in an understandable manner.') }}</p>
                    </div>
                </div>

                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="300">
                    <div class="testimonial-grid">
                        <p class="text-light text-justify fst-italic">{{ t('I have not worked with digitization before, and
                            this taught me so many things I needed to learn and things I didn\'t even know I needed to
                            think about.') }}</p>
                    </div>
                </div>
            </div>

            <ul class="shape-group-17 list-unstyled">
                <li class="shape shape-1"><img src="{{ vite_asset('resources/media/others/bubble-24.png') }}"
                                               alt="Bubble" style="opacity:.2">
                </li>
                <li class="shape shape-2"><img src="{{ vite_asset('resources/media/others/bubble-23.png') }}"
                                               alt="Bubble" style="opacity:.2">
                </li>
                <li class="shape shape-4"><img src="{{ vite_asset('resources/media/others/line-5.png') }}"
                                               alt="Line"></li>

            </ul>
        </article>
    </section>
</x-app-layout>
