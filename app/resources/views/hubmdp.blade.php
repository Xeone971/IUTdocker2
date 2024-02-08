<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{__('page.hhubmdp')}}</h1>
    @foreach($passwords as $password)
        @if($password->user_id === auth()->user()->id)
            <p>{{__('page.url') }}: {{ $password->site }}</p>
            <p>{{ __('page.login') }}: {{ $password->login }}</p>
            <p>{{ __('page.mdp') }}: {{ $password->password }}</p>
            <!-- Ajoutez d'autres champs au besoin -->
            <a href="{{ route('editPassword', ['id' => $password->id]) }}">{{__('page.modifmdp') }}</a>
        @endif
    @endforeach

    <a href="/"><button>{{__('page./') }}</button></a>
</body>
</html>
