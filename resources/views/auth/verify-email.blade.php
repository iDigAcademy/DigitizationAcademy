<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ t('Verify Your Email Address') }}</div>
                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success" role="alert">
                            {{ t('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ t('Before proceeding, please check your email for a verification link.') }}
                    {{ t('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ t('click here to request another') }}</button>.
                    </form>
                </div>
                <p class="mt-3 mb-0 text-center"><small>Issues with the verification process or entered the wrong email?
                        <br>Please sign up with <a href="{{ route('register-retry') }}">another</a> email address.</small></p>
            </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>>
