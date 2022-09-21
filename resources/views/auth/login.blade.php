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
                        <x-form::form method="POST" action="{{ route('login') }}">
                            <x:form::input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                            <x:form::input name="password" type="password" id="password"
                                           label="{{ trans('Password') }}"/>
                            <div class="d-block text-center">
                                <x:form::button.submit>{{ t('Login') }}</x:form::button.submit>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ t('Forgot Your Password?') }}
                                </a>
                            </div>
                        </x-form::form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
