@extends("layout")

@section("title", $title)

@section("content")
    <div class="container">
        <h1>{{$title}}</h1>

        @include("components.errorMessage")

        <form action="/user/auth/signUp" method="post">
            {{ csrf_field() }}
            <label>
                nickname
                <input type="text" name="nickname"/>
            </label>
            <br>
            <label>
                email
                <input type="text" name="email"/>
            </label>
            <br>
            <label>
                password
                <input type="text" name="password"/>
            </label>
            <br>
            <label>
                passwordconfirm
                <input type="text" name="passwordconfirm"/>
            </label>
            <br>
            <label>
                type
                <select name="type">
                    <option value="G">General</option>
                    <option value="A">Admin</option>
                </select>
            </label>

            <br>
            <button type="submit">submit</button>
        </form>
    </div>
@endsection()

