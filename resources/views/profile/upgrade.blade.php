@extends('shell')

@section('content')
<div class="container upgrade">
    <div class="row">
        <div class="center">

            <div class="back" onClick="goBack()">
                <img class="arrow" src="/img/left-arrow-dark.svg" alt="">
                <div class="back-txt">Terug</div>
            </div>

            <img src="/img/road.svg" alt="">

            <div class="access-info">Toegang tot alle trainingen. <br> Nu voor maar <strong>€ 19,95</strong></div>

            <a class="btn" class="btn btn-primary"  href="/create-payment">
                Geef mij toegang
            </a>
        </div>

    </div>
</div>
@endsection
