<x-app-layout>
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{{ t('Contact') }}</div>
                        <div class="card-body">
                            <x-form class="recaptcha" action="{{ route('contact.store') }}">
                                <div class="form-group" type="form">
                                    <x-label for="name" />
                                    <x-input name="name" />
                                    <x-error field="name" />
                                </div>
                                <div class="form-group" type="form">
                                    <x-label for="email" />
                                    <x-email />
                                    <x-error field="email" />
                                </div>
                                <div class="form-group" type="form">
                                    <x-label for="Message" />
                                    <x-textarea name="message" rows="4" cols="30" />
                                    <x-error field="message" />
                                </div>
                                @include('partials.recaptcha')
                                <div class="form-group">
                                    <x-form-button type="submit" class="digi-btn btn-fill-primary btn-fluid btn-primary"
                                            name="submit">Submit
                                    </x-form-button>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group-8 list-unstyled">
            <li class="shape shape-1" data-sal="slide-right" data-sal-duration="500" data-sal-delay="100">
                <img src="{{ mix('images/others/bubble-9.png') }}" alt="Bubble">
            </li>
            <li class="shape shape-2" data-sal="slide-left" data-sal-duration="500" data-sal-delay="200">
                <img src="{{ mix('images/others/bubble-salmon.png') }}" alt="Teal Bubble">
            </li>
            <li class="shape shape-3" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                <img src="{{ mix('images/others/line-4.png') }}" alt="Line">
            </li>
        </ul>
    </div>
</x-app-layout>
