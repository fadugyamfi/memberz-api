@component('mail::message')
# E-Mail Verification Code

Your two-factor(2FA) email verification code is {{ $code }}


This code will expire in {{ config('auth.twofa.email.expires')  }} minute.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
