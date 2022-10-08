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
                        <h1 class="title mb-2">Coming Soono</h1>
                        <h6 class="text-light text">Catalyzing excellence in the creation of digital data about
                            biodiversity specimens.</h6>
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
</x-app-layout>
