<x-mail::message>
#Contact

Name: {{ $data['name'] }}

Email: {{ $data['email'] }}

Message: {{ $data['message'] }}

Thank you,
{{ config('app.name') }}
</x-mail::message>
