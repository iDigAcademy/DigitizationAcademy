<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000"
                 data-sal-delay="300">
                <h1 class="title h2">{{ t('About us') }}</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Dolore eu fugiat nulla pariatur.</p>
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
                <img src="{{ vite_asset('resources/media/others/bubble-20.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                <img src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="Line">
            </li>
        </ul>
    </div>

    <section class="section section-padding mb-0 pb-0">
        <div class="container">
            <div class="">
                <div class="single-blog-content blog-grid">
                    <div class="blog-grid text-left blog-without-thumb mb--40" data-sal="slide-up"
                         data-sal-duration="500" data-sal-delay="100">
                        <blockquote>
                            <h5 class="title text-left">{{ t('“ The purpose of this new course is to listen, observe, understand, digitize, empathize, synthesize, and glean insights into digital speciminations and make the invisible visible”') }}</h5>
                        </blockquote>

                        <div class="author">
                            <div class="author-thumb">
                            </div>
                            <div class="info">
                                <h6 class="author-name">{{ t('Austin Mast, MPH, PHD, MB') }}</h6>

                            </div>
                        </div>
                    </div>
                    <span class="subtitle">{{ t('About Digitization Academy') }}</span>
                    <h2 class="title">{{ t('Our Philosophy') }}</h2>

                    <p class="mb--40" data-sal="slide-up" data-sal-duration="500" data-sal-delay="100">
                    <p>{{ t('iDigBio established the Digitization Academy in 2021 as a systematic approach to delivering
                        high-value specimen digitization training to the global biodiversity collections community.
                        Digitization Academy offerings build on the successes of iDigBio’s 100+ training offerings
                        in this area since its establishment in 2012. iDigBio is the US National Science
                        Foundation’s National Resource for Advancing Digitization of Biodiversity Collections.') }}</p>


                    <p class="mb--40" data-sal="slide-up" data-sal-duration="500" data-sal-delay="100">
                        {{ t('Most
                        Digitization Academy offerings are delivered in one of two ways. Our recurring short courses
                        involve a cohort of ~25 admitted participants who are each associated with a biodiversity
                        collection. These short courses are 12 contact hours, with an additional 8 hours of
                        asynchronous activities, over 4 days. A webinar typically involves an unlimited number of
                        participants in a 2-hour event focused on an emerging topic. All offerings are online and
                        free, unless otherwise noted. A major goal of the Digitization Academy is to build long-term
                        sustainability into it, with the possibility that some courses and/or webinars might have
                        fees in the future.') }}
                    </p>
                </div>
            </div>
        </div>
        <!-- background shapes -->
        <ul class="shape-group-6 list-unstyled">
            <li class="shape shape-1 sal-animate" data-sal="slide-right" data-sal-duration="800"
                data-sal-delay="100">
                <img src="{{ vite_asset('resources/media/others/bubble-7.png') }}" id="leftBackLeaf"
                     alt="Digitization Academy Symbol"
                     data-sal="slide-right" data-sal-duration="500" data-sal-delay="600"></li>
            <li style="margin-bottom:40px;"></li>
        </ul>
        <ul class="shape-group-1 list-unstyled">
            <li class="shape shape-4" style="opacity:.85"><img
                    src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="Line"></li>
            <li class="shape shape-5" style="opacity:.8"><img
                    src="{{ vite_asset('resources/media/others/line-5.png') }}" alt="Line"></li>
        </ul>
    </section>


    <!--=====================================-->
    <!--=    Team section Start             =-->
    <!--=====================================-->
    <section class="section section-padding mt-0 case-study-featured-area bg-dark">
        <div class="container">
            <div class="section-heading text-left text-light">
                <span class="subtitle">{{ t('Digitization Academy') }}</span>
                <h2 class="title text-light">{{ t('Our Team') }}</h2>
            </div>
            @foreach($teams as $team)
                @if($loop->odd)
                    <x-team-member :team="$team"/>
                @else
                    <x-team-member :team="$team" class="content-reverse" data-sal="slide-left"/>
                @endif
            @endforeach
        </div>

        <ul class="list-unstyled shape-group-10">
            <li class="shape shape-1"><img src="{{ vite_asset('resources/media/others/circle-1.png') }}" alt="Circle">
            </li>
            <li class="shape shape-2"><img src="{{ vite_asset('resources/media/others/line-3.png') }}" alt="Circle">
            </li>
            <li class="shape shape-3"><img src="{{ vite_asset('resources/media/others/bubble-5.png') }}" alt="Circle">
            </li>
        </ul>

        <ul class="shape-group-17 list-unstyled">
            <li class="shape shape-1" style="opacity:.08"><img
                    src="{{ vite_asset('resources/media/others/bubble-24.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-2" style="opacity:.06"><img
                    src="{{ vite_asset('resources/media/others/bubble-23.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-3" style="opacity:.25"><img
                    src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="Line"></li>
            <li class="shape shape-5" style="opacity:.2"><img
                    src="{{ vite_asset('resources/media/others/line-5.png') }}" alt="Line"></li>
            <li class="shape shape-6" style="opacity:.25"><img
                    src="{{ vite_asset('resources/media/others/line-4.png') }}" alt="Line"></li>
        </ul>
    </section>
</x-app-layout>
