<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'équipe</title>
</head>
<body>
    <h1>{{__('page.hcteam')}}</h1>

    <form action="{{ route('storeTeam') }}" method="POST">
        @csrf
        
        <label for="name">{{__('page.namet')}} :</label>
        <input type="text" id="name" name="name" required>

        <button type="submit">{{__('page.cteam')}}</button>
    </form>
    <a href="/"><button>{{__('page./') }}</button></a>
    

</body>
</html>
