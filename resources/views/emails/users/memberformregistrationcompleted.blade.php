@component('mail::message')
# Hello and Welcome to Memberz.org.

You are receiving this email because you have completed a registration form for an account on Memberz.org. 
You registration is pending an approval by an Administrator and you would be notified when your account is approved.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
