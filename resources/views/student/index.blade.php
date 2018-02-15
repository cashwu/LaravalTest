@extends("common.layout")

@section("content")

    @include("common.message")

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-fw fa-users"></i> 学生列表</div>
        <table class="table table-responsive table-hover">
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>操作</th>
            </tr>
            <tr>
                <td>1001</td>
                <td>欧阳锋</td>
                <td>男</td>
                <td>18</td>
                <td>
                    <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                    <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="https://www.baidu.com" class="btn btn-danger btn-xs"
                       onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
            <tr>
                <td>1001</td>
                <td>欧阳锋</td>
                <td>男</td>
                <td>18</td>
                <td>
                    <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                    <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="javascript:" class="btn btn-danger btn-xs"
                       onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
            <tr>
                <td>1001</td>
                <td>欧阳锋</td>
                <td>男</td>
                <td>18</td>
                <td>
                    <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-archive"></i> 详情</a>
                    <a href="javascript:" class="btn btn-default btn-xs"><i class="fa fa-fw fa-edit"></i> 修改</a>
                    <a href="javascript:" class="btn btn-danger btn-xs"
                       onclick="return confirm('is del or not???')"><i class="fa fa-fw fa-trash-o"></i> 删除</a>
                </td>
            </tr>
        </table>

    </div>
    <nav aria-label="..." class="pull-right">
        <ul class="pagination pagination-sm">
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
    </nav>

@endsection
