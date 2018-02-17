<div class="col-md-12">
    @if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            @foreach($errors->all() as $error)
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('message') }}
        </div>
    @endif

    @if(Session::has('warning'))
        <div class="alert alert-warning alert-dismissable">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('warning') }}
        </div>
    @endif
</div>