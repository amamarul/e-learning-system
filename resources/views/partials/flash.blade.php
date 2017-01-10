@if (Session::has('message'))
<div class="alert alert-success {{ Session::has('message_important') ? 'alert-important' : '' }}">
    @if (Session::has('message_important'))
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif

    {{ session('message') }}
</div>
@endif