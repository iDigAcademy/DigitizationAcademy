<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ t('Register') }}</div>
                    <div class="card-body">
                        <x-form method="POST" action="{{ route('register') }}" class="recaptcha">
                            <x-label for="name" />
                            <x-input name="name" />
                            <x-error for="name" />
                            <x-label for="email" />
                            <x-email />
                            <x-error for="email" />
                            <x-password name="password" />
                            <x-error for="password" />
                            <x-label for="password_confirmation" />
                            <x-password name="password_confirmation" id="password_confirmation" />
                            @include('partials.recaptcha')
                            <div class="d-block text-center mt-4">
                                <x-form-button>{{ t('Register') }}</x-form-button>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
