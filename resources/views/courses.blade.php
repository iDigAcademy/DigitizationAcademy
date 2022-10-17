<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000"
                 data-sal-delay="300">
                <h1 class="title h2">{{ t('Courses') }}</h1>
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
                <span class="subtitle">{{ t('Current Courses') }}</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.</p>
                <h2 class="title">{{ t('Past / Present') }}</h2>

                <div class="isotope-button isotope-project-btn">
                    <button data-filter="*" class=""><span class="filter-text">{{ t('All Courses') }}</span></button>
                    <button data-filter=".past" class=""><span class="filter-text">{{ t('Past') }}</span></button>
                    <button data-filter=".current" class="is-checked"><span class="filter-text">{{ t('Present') }}</span>
                    </button>
                </div>
            </div>

            <!-- Start courses grid -->
            <div class="row row-35 isotope-list courses justify-content-center" style="position: relative; height: 1304px;">
                @each('partials.course-loop', $courses, 'course', 'partials.no-courses')
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
