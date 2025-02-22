<x-app-layout>
    <div class="breadcrum-area breadcrumb-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">{{ t('Contact') }}</div>
                        <div class="card-body">
                            <x-form::form method="POST" class="recaptcha" action="{{ route('contact.store') }}">
                                <x:form::input name="name" type="text" id="name" label="{{ trans('Name') }}"/>
                                <x:form::input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                                <x:form::textarea name="message" id="message" label="{{ trans('Message') }}"/>
                                @include('partials.recaptcha')
                                <div class="d-block text-center mt-4">
                                    <x:form::button.submit>{{ t('Send') }}</x:form::button.submit>
                                </div>
                            </x-form::form>
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
