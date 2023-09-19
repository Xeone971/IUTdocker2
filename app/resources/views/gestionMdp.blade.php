<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>HTML Forms</h2>

<form action="{{route('checKForm')}}" method="POST">
@csrf
  <label for="URL">URL du site</label><br>
  <input type="text" id="URL" name="URL"><br>
  @error("URL")
  <div>{{$message}}</div>
  @enderror
  <label for="Email">Email</label><br>
  <input type="text" id="Email" name="Email" ><br>
  @error("Email")
  <div>{{$message}}</div>
  @enderror
  <label for="MDP">MDP</label><br>
  <input type="text" id="MDP" name="MDP" ><br><br>
  @error("MDP")
  <div>{{$message}}</div>
  @enderror
  <input type="submit" value="Submit">
</form> 
@if ($errors->any())
                                <div class="alert alert-danger text-xl font-semibold text-gray-900 dark:text-white">
                                    <p>{{dd($errors->all())}}</p>
                                </div>
                            @endif
</body>
</html>