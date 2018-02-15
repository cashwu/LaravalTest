@extends("layout")

@section("header")

    <p>url -- {{ url("url") }}</p>

    <p>action -- {{ action("StudentOldController")  }}</p>

    <p>route -- {{ route("urlT")  }}</p>

@endsection

@section("sidebar")
    sidebar
@endsection


@section("content")

    <!-- 輸出 php 變量 -->
    <p>{{$name}}</p>

    <!-- 模版中調用 php 代碼 -->
    <p>{{ time() }}</p>

    <p>{{ date("Y-m-d H:i:s", time()) }}</p>

    <p>{{ in_array($name, $arr) ? "true": "false" }}</p>

    <p>{{ var_dump($arr) }}</p>

    <p>{{ isset($name) ? $name : "Default"  }}</p>

    <p>{{  $name1 or "Default"  }}</p>

    <!-- 原樣輸出 -->

    <p>@{{ $name }}</p>

    {{-- 模版中的注釋 --}}

    {{-- include --}}
    @include("student.common", ["msg" => "test 123"])

    @if($name == "cash")
        i am cash
    @elseif($name == "aa")
        i am aa
    @else
        who am i
    @endif

    <br>

    @if(in_array($name, $arr))
        true
    @else
        false
    @endif

    <br>

    @unless( $name != "cash")
        i am cash
    @endunless

    <br>

    @for($i = 0 ; $i < 10; $i++)
        {{ $i }}
    @endfor

    <br>

    @foreach($students as $student)
        {{ $student -> name }},
    @endforeach

    <br>

    @forelse($students as $student)
        {{ $student -> name }},
    @empty
        null
    @endforelse


@endsection