<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ t('Login') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <x-form action="{{ route('login') }}" class="recaptcha">
                            <x-label for="email" />
                            <x-input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                            <x-error field="email" />
                            <x-label for="password" />
                            <x-password label="{{ trans('Password') }}"/>
                            <x-error field="password" />
                            <x-label for="remember" />
                            <x-checkbox name="remember" />
                            @include('partials.recaptcha')
                            <div class="d-block text-center mt-4">
                                <x-form-button>{{ t('Login') }}</x-form-button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ t('Forgot Your Password?') }}
                                </a>
                            </div>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
