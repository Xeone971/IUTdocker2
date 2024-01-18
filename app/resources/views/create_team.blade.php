<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'équipe</title>
</head>
<body>
    <h1>Création d'équipe</h1>

    <form action="{{ route('storeTeam') }}" method="POST">
        @csrf
        
        <label for="name">Nom de l'équipe :</label>
        <input type="text" id="name" name="name" required>

        <button type="submit">Créer l'équipe</button>
    </form>
    

</body>
</html>
