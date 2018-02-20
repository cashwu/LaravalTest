@extends("layout")

@section("title", $title)

@section("content")

    <div class="container">

        <h1>{{ $title }}</h1>

        @include("components.errorMessage")

        <form action="/product/{{$product->id}}/edit"
            method="post" enctype="multipart/form-data" >

            {{ method_field("PUT") }}
            {{ csrf_field() }}

            <label for="">
                商品狀態
                <select name="status" id="">
                    <option value="C" @if(old("status", $product->status) == "C") selected @endif >建立中</option>
                    <option value="S" @if(old("status", $product->status) == "S") selected @endif >可販售</option>
                </select>
            </label>
            <br>
            <label >
                商品名稱
                <input type="text" name="name"
                    placeholder="商品名稱" value="{{ old("name", $product -> name) }}" >
            </label>
            <br>
            <label >
                商品英文名稱
                <input type="text" name="name_en"
                       placeholder="商品英文名稱" value="{{ old("name_en", $product -> name_en) }}" >
            </label>
            <br>
            <label>
                商品介紹
                <input type="text" name="description"
                       placeholder="商品介紹" value="{{ old("description", $product -> description) }}" >
            </label>
            <br>
            <label>
                商品英文介紹
                <input type="text" name="description_en"
                       placeholder="商品英文介紹" value="{{ old("description_en", $product -> description_en) }}" >
            </label>
            <br>
            <label>
                Photo
                <input type="file" name="photo"
                       placeholder="photo" >
                <img src="{{ $product -> photo or "/assets/images/default-product.png" }}" style="width: 30px; height: 30px;">
            </label>
            <br>
            <label>
                Price
                <input type="text" name="price"
                       placeholder="price" value="{{ old("price", $product -> price) }}" >
            </label>
            <br>
            <label>
                Count
                <input type="text" name="count"
                       placeholder="count" value="{{ old("count", $product -> count) }}" >
            </label>

            <br>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-info" href="{{ url("product/manage") }}">Back To Manage</a>
        </form>

    </div>
@endsection