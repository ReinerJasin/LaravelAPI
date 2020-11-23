@component('mail::message')
# Activate Account

Click the 'verify' button to verify your account.

@component('mail::button', ['url' => route('activate', ['token' => $user->activation_token, 'email' => $user->email])])
Verify
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent
