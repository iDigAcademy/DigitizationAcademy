<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000"
                 data-sal-delay="300">
                <h1 class="title h2">{{ t('Here for you') }}</h1>
                <p>{{ t('We love to share our experience with you and love to learn from your experience. Let’s talk!') }}</p>
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
                            <h5 class="title text-left fst-italic">{{ t('“We established the Digitization Academy in 2021 as a framework in which to deliver a set of complementary training opportunities to those eager to excel at the creation of digital information about Earth’s biota, especially as documented in biodiversity collections.”') }}</h5>
                        </blockquote>

                        <div class="author">
                            <div class="author-thumb">
                            </div>
                            <div class="info">
                                <h6 class="author-name">{{ t('Austin Mast, Digitization Academy Lead') }}</h6>

                            </div>
                        </div>
                    </div>
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
                <h2 class="title text-light">{{ t('Current Team Members') }}</h2>
            </div>
            @forelse ($currentTeam as $team)
                @if($loop->odd)
                    <x-team-member :team="$team"/>
                @else
                    <x-team-member :team="$team" class="content-reverse" data-sal="slide-left"/>
                @endif
            @empty

            @endforelse
        </div>

        <div class="container">
            <div class="section-heading text-left text-light">
                <h2 class="title text-light">{{ t('Former Team Members') }}</h2>
            </div>
            @forelse ($formerTeam as $team)
                @if($loop->odd)
                    <x-team-member :team="$team"/>
                @else
                    <x-team-member :team="$team" class="content-reverse" data-sal="slide-left"/>
                @endif
            @empty

            @endforelse
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
