<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ t('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <x-form method="POST" action="{{ route('password.email') }}">
                            <x-label for="email"/>
                            <x-email />
                            <x-error for="email"/>
                            <div class="d-block text-center">
                                <x-form-button>{{ t('Send Password Reset Link') }}</x-form-button>
                            </div>
                        </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>>
