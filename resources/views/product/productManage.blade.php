@extends("layout")

@section("title", $title)

@section("content")
    <div class="container">
        <h1>{{ $title }}</h1>

        @include("components.errorMessage")

        <table class="table table-striped table-bordered table-hover">
            <caption>
                <a class="btn btn-info" href="{{ url("product/create") }}">Create</a>
            </caption>
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Status</th>
                <th>Price</th>
                <th>Count</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productPaginate as $product)
                <tr>
                    <td>{{ $product -> id }}</td>
                    <td>{{ $product -> name }}</td>
                    <td><img src="{{ $product -> photo or "/assets/images/default-product.png"  }}"
                             style="height: 30px; width: 45px;"/></td>
                    <td>
                        @if($product->status === "C")
                            建立中
                        @else
                            可販售
                        @endif
                    </td>
                    <td>{{ $product -> price }}</td>
                    <td>{{ $product-> count }}</td>
                    <td>
                        <a class="btn btn-info" href="/product/{{ $product -> id }}/edit">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $productPaginate->links() }}
    </div>
@endsection
