@component('mail::message')
# Valider votre compte

Bienvenue {{ $user->name }},

Cliquer sur ce boutton pour comfirmer votre compte

@component('mail::button', ['url' => route('confirmed', [$user, $user->token])])
Valider votre compte
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
