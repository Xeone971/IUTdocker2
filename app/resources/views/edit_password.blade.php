<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le mot de passe</title>
</head>
<body>
    <h1>{{__('page.editmdp') }}</h1>

    <form action="{{ route('updatePassword', ['id' => $password->id]) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="current_password">{{__('page.mdpactuel') }}</label>
        <input type="password" id="current_password" name="current_password" required>
        
        <label for="new_password">{{__('page.newmdp') }}</label>
        <input type="password" id="new_password" name="new_password" required>

        <label for="confirm_password">{{__('page.confirmmdp') }}</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">{{__('page.editmdp') }}</button>
    </form>
</body>
</html>
