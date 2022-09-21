<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <x-form::form method="POST" action="{{ route('password.email') }}">
                            <x:form::input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                            <div class="d-block text-center">
                                <x:form::button.submit>{{ __('Send Password Reset Link') }}</x:form::button.submit>
                            </div>
                        </x-form::form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>>
