@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{$message}}</strong>
</div>

@endif

@if (session()->has('error'))
<p class="alert alert-danger">{{ session('error') }}</p>
@endif