<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000"
                 data-sal-delay="300">
                <h1 class="title h2">Course Calendar</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="banner-thumbnail" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="400">
                <img class="paralax-image" src="{{ vite_asset('resources/media/banner/banner-lichen.png') }}"
                     alt="Illustration">
            </div>
        </div>
        <ul class="shape-group-8 list-unstyled">
            <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/bubble-9.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                <img src="{{ vite_asset('resources/media/others/bubble-22.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                <img src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="Line">
            </li>

        </ul>
    </div>


    <!--=====================================-->
    <!--=      Calendar  Area Start       =-->
    <!--=====================================-->
    <section class="section section-padding mb-0 pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9 text-center mb-5">
                    <h2 class="heading-section">Calendar</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <ul class="shape-group-6 list-unstyled">
            <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="800"
                data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/bubble-7.png') }}" id="leftBackLeaf"
                     alt="Digitization Academy Symbol"
                     data-sal="slide-right" data-sal-duration="500" data-sal-delay="600"></li>
            <li style="margin-bottom:40px;"></li>
        </ul>
    </section>


    <!--=====================================-->
    <!--=        Testimonial Area Start     =-->
    <!--=====================================-->
    <section class="bg-dark mb-4 section section-padding pb--70">
        <article class="container pb--70">
            <div class="section-heading heading-left">
                <span class="subtitle">What participants are saying.</span>
                <h2 class="title text-light">Evaluations help us further refine our courses with each
                    iteration.</h2>
                <p></p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="100">
                    <div class="testimonial-grid">
                        <p class="text-light">Topics were discussed in great detail. The instructors were very
                            helpful and enthusiastic in answering queries and sharing resources. The activities were
                            practical in that the questions were centered around our individual research.</p>
                    </div>
                </div>

                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="200">
                    <div class="testimonial-grid active text-light">
                        <p class="text-light text-justify">This was a really well-put-together class that took us
                            through the various steps and details of a collection digitization project. Great use of
                            technology, easy to follow, well documented, and well-thought exercises. I am a big fan
                            of audience participation, and that was well done. Highly knowledgeable instructors too.
                            Erica and Lauren are very engaging and dynamic speakers, and Austin is skilled at
                            conveying technical relationships in an understandable manner.</p>
                    </div>
                </div>

                <div class="col-lg-4" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="300">
                    <div class="testimonial-grid">
                        <p class="text-light text-justify text">I have not worked with digitization before, and this
                            taught me so many things I needed to learn and things I didn't even know I needed to
                            think about.</p>
                    </div>
                </div>
            </div>

            <hr class="mt-0 mb-0">

            <ul class="shape-group-17 list-unstyled">
                <li class="shape shape-1"><img src="{{ vite_asset('resources/media/others/bubble-24.png') }}"
                                               alt="Bubble"
                                               style="opacity:.2"></li>
                <li class="shape shape-2"><img src="{{ vite_asset('resources/media/others/bubble-23.png') }}"
                                               alt="Bubble"
                                               style="opacity:.2"></li>
                <li class="shape shape-4"><img src="{{ vite_asset('resources/media/others/line-5.png') }}" alt="Line">
                </li>
                <li class="shape shape-6"><img src="{{ vite_asset('resources/media/others/line-5.png') }}" alt="Line">
                </li>
            </ul>
        </article>
    </section>
</x-app-layout>
