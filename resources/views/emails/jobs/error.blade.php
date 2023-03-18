<x-mail::message>
{{ t('A job error has occurred.') }}

{!! $message !!}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
