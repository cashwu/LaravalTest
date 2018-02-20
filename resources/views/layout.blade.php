<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<ul class="list-group">
    @if(session()->has("user_id"))
        <li class="list-group-item"><a href="{{"/user/auth/signOut" }}">Logout</a></li>
    @else
        <li class="list-group-item"><a href="{{"/user/auth/signIn"}}">SignIn</a></li>
        <li class="list-group-item"><a href="{{"/user/auth/signUp"}}">Register</a></li>
    @endif
</ul>


<div class="container">
    @yield('content')
</div>

</body>
</html>