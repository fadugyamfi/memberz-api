@component('mail::message')
# Hello {{ $member_name }},

You have successfully completed registration with <b>{{ $organisation_name }}</b> on Memberz.org.
You registration is pending approval by an administrator and you will be notified when your application is processed.

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
