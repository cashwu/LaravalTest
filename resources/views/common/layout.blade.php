<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap-theme.min.css")  }}">
    <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css")  }}">
    <title>@yield("title")</title>
    @section("style")
    @show
</head>
<body>

@section("header")
    <header class="jumbotron">
        <div class="container-fluid">
            <h1><i class="fa fa-fw fa-commenting"></i>轻松学会laravel</h1>
            <p>玩转laravel表单</p>
        </div>
    </header>
@show
<main class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @section("leftmenu")
                <div class="list-group">
                    <a href="{{ url("/")  }}" class="list-group-item
                        {{ Request::getPathInfo() == "/" ? "active" : ""  }}">
                        <i class="fa fa-fw fa-users"></i> 学生列表
                    </a>
                    <a href="{{ url("/create")  }}" class="list-group-item
                        {{ Request::getPathInfo() == "/create" ? "active" : ""  }}">
                        <i class="fa fa-fw fa-plus"></i> 新增学生
                    </a>
                </div>
            @show
        </div>
        <div class="col-md-10">
            @section("content")
            @show
        </div>
    </div>
</main>

@section("footer")
    <footer class="jumbotron container-fluid">
        <div class="container">
            <i class="fa fa-fw fa-copyright"></i> 2016 imooc
        </div>
    </footer>
@show


<script src="{{ asset("js/jquery-1.12.4.min.js")  }}"></script>
<script src="{{ asset("js/bootstrap.js")  }}"></script>

@section("script")
@show

</body>
</html>
