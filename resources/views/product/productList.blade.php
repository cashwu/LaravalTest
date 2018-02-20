@extends("layout")

@section("title", $title)

@section("content")
    <div class="container">
        <h1>{{ $title }}</h1>

        @include("components.errorMessage")

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productPaginate as $product)
                <tr>
                    <td><a href="/product/{{ $product -> id }}">{{ $product -> name }}</a></td>
                    <td><img src="{{ $product -> photo or "/assets/images/default-product.png"  }}"
                             style="height: 30px; width: 45px;"/></td>
                    <td>{{ $product -> price }}</td>
                    <td>{{ $product-> count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $productPaginate->links() }}
    </div>
@endsection
