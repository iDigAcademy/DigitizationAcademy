<x-app-layout>
    <section class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-sm-12">
                    <div class="contact-form-box shadow-box mb--30 px-sm-4">
                        Please confirm your password before continuing.

                        <form action="{{ route('password.confirm') }}" class="recaptcha">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           autocomplete="current-password"
                                           required/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @include('partials.recaptcha')
                                <div class="form-group">
                                    <button type="submit" class="digi-btn btn-fill-primary btn-fluid btn-primary"
                                            name="submit-btn">Confirm Password
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
