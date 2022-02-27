<div class="row">
    <div class="col-md-12">
        <div class="alert_div"></div>
    </div>
</div>

<div class="alerts m-t-10 text-left">
    @if (Session::has('info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('info') !!}
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('error') !!}
    </div>
    @endif

    @if (Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('success') !!}
    </div>
    @endif


    @if (Session::has('status'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('status') !!}
    </div>
    @endif


    @if (Session::has('warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! Session::get('warning') !!}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        @foreach($errors->getMessages() as $errors)
        @foreach ($errors as $error)
        {!! $error !!}<br>
        @endforeach
        @endforeach

    </div>
    @endif
</div>
