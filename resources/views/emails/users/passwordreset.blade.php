@component('mail::message')
# Password Reset Request

You are receiving this email because we received a password reset request for your account. Click on the link below to reset password.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent


This password reset link will expire in {{ config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') }} minute.

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
