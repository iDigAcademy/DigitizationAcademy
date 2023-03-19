<x-app-layout>
    <!--=====================================-->
    <!--              Hero Banner            -->
    <!--=====================================-->
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="section-heading heading-left" data-sal="slide-right" data-sal-duration="1000"
                 data-sal-delay="300">
                <h1 class="title h2">{{ t('Put Collaborative Learning on your Calendar') }}</h1>
                <p>{{ t('We admit about 25 students to each of our 12-hour courses to ensure that everyone has a chance to contribute. Our 2-hour courses are open to everyone who registers.') }}</p>
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
                    <h2 class="heading-section">{{ t('Calendar') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <iframe src="{{ config('config.idigbio_event_calendar') }}" style="border:solid 1px #777" width="800" height="800" frameborder="0" scrolling="no"></iframe>
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
</x-app-layout>
