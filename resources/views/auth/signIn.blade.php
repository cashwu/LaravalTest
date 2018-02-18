@extends("layout")

@section("title", $title)

@section("content")

    <div class="container">

        <h1>{{ $title }}</h1>

        @include("components.errorMessage")

        <form action="{{ url("user/auth/signIn") }}" method="post">
            {{ csrf_field() }}
            <label>
                Email :
                <input type="text" name="email" placeholder="Email"
                       value="{{ old("email")  }}"/>
            </label>

            <label>
                Password :
                <input type="text" name="password" placeholder="password"
                       value="{{ old("password")  }}"/>
            </label>
            <br>
            <button type="submit">Login</button>
        </form>

    </div>


@endsection