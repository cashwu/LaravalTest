@extends("layout")

@section("title", $title)

@section("content")

    <div class="container">
        <h1>{{ $title }}</h1>

        @include("components.errorMessage")

        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th>name</th>
                <td>{{ $product -> name }}</td>
            </tr>
            <tr>
                <th>photo</th>
                <td><img src="{{ $product -> photo or "/assets/images/default-product.png"  }}"
                         style="height: 30px; width: 45px;"/></td>
            </tr>
            <tr>
                <th>price</th>
                <td>{{ $product -> price }}</td>
            </tr>
            <tr>
                <th>count</th>
                <td>{{ $product-> count }}</td>
            </tr>
            <tr>
                <th>desc</th>
                <td>{{ $product-> description }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <form action="/product/{{$product -> id}}/buy" method="post">
                        Count
                        <select name="count">
                            @for($count = 0; $count <= $product -> count; $count++)
                                <option value="{{$count}}">{{$count}}</option>
                            @endfor
                        </select>
                        <button class="btn btn-warning">Buy</button>
                        {{ csrf_field() }}
                    </form>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection