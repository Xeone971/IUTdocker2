<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des équipes</h1>
    @foreach($teams as $team)
        <p>Site: {{ $team->name }}</p>
        <a href="/ajoutTeam/{{$team->id}}">Ajouter un membre</a>
        
        
    @endforeach
    
</body>
</html>
