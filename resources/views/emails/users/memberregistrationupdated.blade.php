@component('mail::message')
# Hello and Welcome to Memberz.org.

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
