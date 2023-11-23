<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Voici le récap de vos sites enregistrés</h1>
    @foreach($passwords as $password)
        @if($password->user_id === auth()->user()->id)
            <p>Site: {{ $password->site }}</p>
            <p>Login: {{ $password->login }}</p>
            <p>Mdp: {{ $password->password }}</p>
            <!-- Ajoutez d'autres champs au besoin -->
            <a href="{{ route('editPassword', ['id' => $password->id]) }}">Modifier ce mot de passe</a>
        @endif
    @endforeach

    <a href="/"><button>Retour à la page d'accueil</button></a>
</body>
</html>
