@extends("layout")

@section("title", $title);

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
                <th>TotalPrice</th>
                <th>Buy Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactionPaginate as $transaction)
                <tr>
                    <td>
                        <a href="/product/{{$transaction -> product->id}}">{{ $transaction -> product -> name }}</a>
                    </td>
                    <td>
                        <img src="{{ $transaction-> product -> photo or "/assets/images/default-product.png"  }}"
                             style="height: 30px; width: 45px;"/></td>
                    <td> {{$transaction -> price}} </td>
                    <td> {{$transaction -> count}} </td>
                    <td> {{$transaction -> total_price}} </td>
                    <td> {{$transaction -> created_at}} </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $transactionPaginate->links() }}
    </div>
@endsection