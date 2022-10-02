<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ t('Contact') }}</div>
                    <div class="card-body">
                        <x-form::form method="POST" action="{{ route('contact.post') }}">
                            <x:form::input name="name" type="text" id="name" label="{{ trans('Name') }}"/>
                            <x:form::input name="email" type="email" id="email" label="{{ trans('Email') }}"/>
                            <x:form::textarea name="message" id="message" label="{{ trans('Message') }}"/>
                            {!! NoCaptcha::display() !!}
                            <div class="d-block text-center mt-4">
                                <x:form::button.submit>{{ t('Send') }}</x:form::button.submit>
                            </div>
                        </x-form::form>
                        {!! NoCaptcha::renderJs() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
