@extends('shell')

@section('content')


<div class="container">
    <div class="profile">

        @if(Session::has('message'))
            <div class="message">
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            </div>
        @endif

        <h2>Hallo, <span class="user-name">{{Auth::user()->name}}</span></h2>

        <strong>Jouw trainingen</strong>


        <div class="archivements">

            @foreach ($badges as $badge)
                <div class="badge-block col-sm-3">
                    <div class="color {{ $badge->badge->color }}">

                    </div>
                    <div> {{ $badge->badge->title }}</div>
                </div>
            @endforeach
        </div>

        @if (count($courses) > 0)
        <div class="courses">
            <h5>Trainingen</h5>
            <ul>
                @foreach ($courses as $course)
                <a href="{{ str_slug($course->getCategoryTitle()) }}/{{ $course->course->id }}/{{ str_slug($course->getCourseName()) }}">
                    <li>

                        @if ($course->completed == 1)
                            <div class="" style="float: right;">completed</div>
                        @endif

                        <!-- make category slug for pretty url -->

                        <!-- imporve course design -->

                        {{ $course->getCourseName() }}
                    </li>
                </a>
                @endforeach
            </ul>
        </div>

        <a class="btn btn-primary" type="button" class="btn btn-primary" href="{{ url('/onderwerpen') }}">
            Bladeren
        </a>
        @else

        <br>

        <a class="btn btn-primary" type="button" class="btn btn-primary" href="{{ url('/onderwerpen') }}">
            Nu beginnen
        </a>
        @endif
    </div>

    <div class="col-sm-4 hide">
        <div class="card profile-card">
            <div class="col-sm-5">
                <img src="/img/businessman.svg" alt="">
            </div>
            <div class="col-sm-7">
                <h2>Dennis Adriaansen</h2>
            </div>
        </div>

        <div class="card profile-info">
            <ul>
                <li>Behaalde trainingen</li>
                <li>Archief</li>
            </ul>
        </div>

        <div class="card skills">
            <ul>
                <li class="col-sm-4">
                    <span class="dot color-orange"></span>
                    <span class="int">10</span>
                    <div class="skill">vragen beantwoord</div>
                </li>
                <li class="col-sm-4">
                    <span class="dot color-orange"></span>
                    <span class="int">4</span>
                    <div class="skill">traingen afgerond</div>
                </li>
                <li class="col-sm-4">
                    <span class="dot color-orange"></span>
                    <span class="int">1</span>
                    <div class="skill">categorie compleet</div>
                </li>
            </ul>
        </div>
    </div>
</div>


@endsection
