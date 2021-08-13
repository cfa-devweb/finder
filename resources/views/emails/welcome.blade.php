@component('mail::message')

# Bonjour {{ $first_name }},

Vous avez été invité à créer votre compte {{ config('app.name') }}.

<h3>Vos informations de connexion : </h3>

<p>{{ $email }}</p>

Initialiser votre mot de passe en cliquant sur le lien ci-dessous pour finaliser votre compte et profiter de votre espace étudiant.

@component('mail::button', ['type' => 'accent', 'url' => $url])
    Initialisation du mot de passe
@endcomponent

Merci,<br>
Ce mail est généré automatiquement par {{ config('app.name') }}.
@endcomponent