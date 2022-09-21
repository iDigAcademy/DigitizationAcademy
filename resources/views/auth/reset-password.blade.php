<x-app-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <x-form::form method="POST" action="{{ route('password.update') }}">
                        <x:form::input name="token" type="hidden" id="token" value="{{ request()->route('token') }}"/>
                        <x:form::input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                        <x:form::input name="password" type="password" id="password" label="{{ trans('Password') }}"/>
                        <x:form::input name="password_confirmation" type="password" id="password_confirmation" label="{{ trans('Confirm Password') }}"/>
                        <div class="d-block text-center">
                            <x:form::button.submit>{{ __('Reset Password') }}</x:form::button.submit>
                        </div>
                    </x-form::form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
