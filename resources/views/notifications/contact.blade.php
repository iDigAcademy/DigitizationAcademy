@component('mail::message')
# {{ t('Contact') }}

{{ t('Name') }}: {{ $data['name'] }}

{{ t('Email') }}: {{ $data['email'] }}

{{ t('Message') }}: {{ $data['message'] }}

{{ t('Thank you') }},

{{ config('app.name') }}
@endcomponent
