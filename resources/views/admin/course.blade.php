@extends('angular')

@section('content')

@include('partials.flash')

<select name="" id="">
    <option value="test">test</option>
    <option value="test">test2</option>
    <option value="test">test2</option>
</select>

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
@endsection

