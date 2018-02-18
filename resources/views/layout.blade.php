<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
</head>
<body>

<ul>
    @if(session()->has("user_id"))
        <li><a href="{{"/user/auth/signOut" }}">Logout</a></li>
    @else
        <li><a href="{{"/user/auth/signIn"}}">SignIn</a></li>
        <li><a href="{{"/user/auth/signUp"}}">Register</a></li>
    @endif
</ul>


<div class="container">
    @yield('content')
</div>

</body>
</html>