@component('mail::message')
# E-Mail Verification Code

Your two-factor(2FA) email verification code is <b><u>{{ $code }}</u></b>


This code will expire in {{ config('auth.twofa.email.expires')  }} minute(s).

If you have not tried to login, ignore this message.

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
