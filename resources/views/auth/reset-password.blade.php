<x-app-layout>
    <section class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-sm-12">
                    <div class="contact-form-box shadow-box mb--30 px-sm-4">
                        <form method="post" action="{{ route('password.update') }}" class="recaptcha">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            @include('partials.recaptcha')
                            <div class="form-group">
                                <button type="submit" class="digi-btn btn-fill-primary btn-fluid btn-primary secondary"
                                        name="submit-btn">Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
