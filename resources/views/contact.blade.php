<x-app-layout>
    <section class="banner page">
        <div class="container-fluid">
            <div class="banner-content">
                <h1 class="page-title mt-5">We would love to hear from you</h1>
                <p class="page-lead">
                    Ask a question, share your thoughts, or suggest a topic you'd like to explore further.
                </p>
            </div>
            <!-- graphic shapes -->
            <ul class="list-unstyled shape-group-pages">
                <li class="shape shape-1">
                    <img class="paralax-image" src="{{ asset('images/banner/salmon-pic.png') }}" alt="Salmon Specimen Image">
                </li>
                <li class="shape shape-7">
                    <img src="{{ asset('images/others/bubble-salmon.png') }}"
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
    <!-- Contact  Area Start     =-->
    <section class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-sm-12">
                    <div class="contact-form-box shadow-box mb--30 px-sm-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('contact.store') }}" class="recaptcha">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group mb--40">
                                <label>Message</label>
                                <textarea class="form-control textarea" name="message"
                                          cols="30" rows="4" required></textarea>
                            </div>
                            @include('partials.recaptcha')
                            <div class="form-group">
                                <button type="submit" class="digi-btn btn-fill-primary secondary btn-fluid btn-primary"
                                        name="submit-btn">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
