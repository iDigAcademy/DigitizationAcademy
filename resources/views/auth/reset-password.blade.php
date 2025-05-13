<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ t('Reset Password') }}</div>
                <div class="card-body">
                    <x-form method="POST" action="{{ route('password.update') }}">
                        <x-input name="token" type="hidden" id="token" value="{{ request()->route('token') }}"/>
                        <x-label for="email" />
                        <x-email />
                        <x-label for="password" />
                        <x-password />
                        <x-label for="password_confirmation" />
                        <x-password name="password_confirmation" type="password" id="password_confirmation" />
                        <div class="d-block text-center">
                            <x-form-button>{{ t('Reset Password') }}</x-form-button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
