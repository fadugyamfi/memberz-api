@component('mail::message')
# Password Reset Request

You are receiving this email because an administrator in {{ $organisation }} created an account for you. Click on the link below to set your password.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent


This password reset link will expire in {{ config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') }} minute.

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
