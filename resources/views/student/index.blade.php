@extends("common.layout")

@section("content")

    @include("common.message")

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-fw fa-users"></i> 学生列表</div>
        <table class="table table-responsive table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>Time</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student -> id  }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{$student->age}}</td>
                    <td>{{ $student->sex($student-> sex) }}</td>
                    <td>{{date("Y-m-d", $student-> created_at)}}</td>
                    <td>
                        <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                        <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                        <a href="https://www.baidu.com" class="btn btn-danger btn-xs"
                           onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="pull-right">
        {{$students->render()}}
    </div>

@endsection
