<x-app-layout>
    <section class="banner page">
        <div class="container-fluid">
            <div class="banner-content">
                <h1 class="page-title mt-2">Put collaborative learning<br> on your calendar</h1>
                <p class="page-lead">
                    We admit about 25 students to each of our 12-hour courses to ensure that
                    everyone has a chance to contribute. Our 2-hour courses are open to everyone who registers.</p>
            </div>
            <!-- graphic shapes -->
            <ul class="list-unstyled shape-group-pages">
                <li class="shape shape-1">
                    <img class="paralax-image" src="{{ asset('images/banner/egg-pic.png') }}"
                         alt="Egg Specimen Image">
                </li>
                <li class="shape shape-7">
                    <!-- calendar-bubble.png -->
                    <img src="{{ asset('images/others/bubble-purple.png') }}"
                         alt="Graphic of purple bubble"
                         style="opacity: 0.9;">
                </li>
            </ul>

        </div><!-- container -->
    </section>

    <!-- shape groups -->
    <ul class="shape-group-6 list-unstyled">
        <li class="shape shape-1">
            <img src="{{ asset('images/logo/watermarkApr2025.svg') }}" alt="Bubble">
        </li>
    </ul>
    <!-- Calendar Start -->
    <section class="section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <iframe class="mt-5" src="https://calendar.google.com/calendar/embed?src={{ config('config.google_course_calender_id') }}&ctz=America%2FNew_York" style="border: 0" width="800" height="600"></iframe>
            </div>
        </div>
    </section>
</x-app-layout>
