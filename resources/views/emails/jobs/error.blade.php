<x-mail::message>
#{{ t('Job Error') }}

{!! $message !!}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
