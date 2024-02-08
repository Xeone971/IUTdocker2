<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{__('page.hhubteam') }}</h1>
    @foreach($teams as $team)
        <p>{{__('page.team')}}: {{ $team->name }}</p>
        <a href="/ajoutTeam/{{$team->id}}">{{__( 'page.addm' )}}</a><br/>
        
        
    @endforeach
    <a href="/"><button>{{__('page./') }}</button></a>
</body>
</html>
