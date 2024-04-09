<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ t('Register') }}</div>
                    <div class="card-body">
                        <x-form::form method="POST" action="{{ route('register') }}" class="recaptcha">
                            <x:form::input name="name" type="text" id="name" label="{{ trans('Full Name') }}"/>
                            <x:form::input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                            <x:form::input name="password" type="password" id="password" label="{{ trans('Password') }}"/>
                            <x:form::input name="password_confirmation" type="password" id="password_confirmation" label="{{ trans('Confirm Password') }}"/>
                            @include('partials.recaptcha')
                            <div class="d-block text-center mt-4">
                                <x:form::button.submit>{{ t('Register') }}</x:form::button.submit>
                            </div>
                        </x-form::form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
