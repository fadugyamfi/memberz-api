<!DOCTYPE html>
<html lang="en">

<body>
    <h4>Password Reset Request</h4>
    <p>You are receiving this email because we received a password reset request for your account. Click on the link
        below to reset password.</p>
    <p><a href="{{ $url }}">
            {{ $url }}
        </a></p>
    <p>
        This password reset link will expire in
        {{ config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') }}
    </p>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Best regards</p>

</body>

</html>
