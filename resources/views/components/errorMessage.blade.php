
@if($errors AND count($errors))
    <ul style="color: #ff6666;">
        @foreach($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </ul>
@endif