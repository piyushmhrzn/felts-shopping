@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show">{{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">{{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('login-error'))
    <div style="margin:15px 0;padding:10px;text-align:center;background:#D4380F;color:#fff">
        {{session('login-error')}}      
    </div>
@endif
@if(session('login-success'))
    <div style="margin:15px 0;padding:10px;text-align:center;background:#18D26E;color:#fff">
        {{session('login-success')}}      
    </div>
@endif