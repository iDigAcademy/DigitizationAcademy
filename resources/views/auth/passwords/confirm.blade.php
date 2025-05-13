<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ t('Confirm Password') }}</div>

                <div class="card-body">
                    {{ t('Please confirm your password before continuing.') }}

                    <x-form action="{{ route('password.confirm') }}">
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ t('Password') }}</label>
                            <div class="col-md-6">
                                <x-password class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <x-form-button class="btn btn-primary">
                                    {{ t('Confirm Password') }}
                                </x-form-button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ t('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
