@component('mail::message')
# Hello and Welcome to Memberz.org.

You are receiving this email because you created an account on Memberz.org. 
Click on the link below to activiate account or ignore if this action not initiated by you.

@component('mail::button', ['url' => $url])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
