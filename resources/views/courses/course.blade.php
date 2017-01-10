@extends('shell')

@section('content')

<div class="container">
    <div class="course">
        <div class="col-sm-10 div-center">
            <div class="card">
                <div class="status">
                    <a href onClick="goBack()"><img src="/img/arrow-left-secondary.svg" alt=""/> <img src="/img/more.svg" alt=""/></a>
                    <h2>{{ $course->title }}</h2>
                </div>

                <div class="col-sm-12">
                    <div class="course-heading">

                        @include('partials.flash')

                        <p>{{ $course->description }}</p>

                        <a href="/play/{{ $course->id }}/0" class="btn btn-primary">Start training</a>
                    </div>
                </div>

                @if (Auth::user())
                <div class="col-sm-12">
                    <div class="table-of-contents">
                        <h6>Inhoud</h6>
                        <ol>
                            @foreach ($course->questions as $idx => $question)
                            <li>
                                <img class="@if ($question->answer->context == $question->given['answer']) active @endif" src="/img/check-symbol.svg" alt="">
                                {{ $idx + 1 }}. {{ $question->title }}
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                @else

                <div class="col-sm-12">
                    <div class="col-sm-12">
                        Please login.
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection

