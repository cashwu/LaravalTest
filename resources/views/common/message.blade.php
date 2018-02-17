@if(Session::get("success"))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        <strong>成功!</strong> {{Session::get("success")}}.
    </div>
@endif

@if(Session::get("error"))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        <strong>失敗!</strong> {{Session::get("error")}}.
    </div>
@endif
