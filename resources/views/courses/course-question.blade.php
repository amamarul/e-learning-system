@extends('shell')

@section('content')

<form id="answer-form" action="/check-answer" method="post">
    <div class="question-detail">
        <div class="question-wrapper">

            <div class="container">
                <div class="col-sm-7">
                    <div class="row">
                        <a href="">
                            <img src="/img/arrow-left-secondary.svg" alt=""/> <img src="/img/more.svg" alt=""/>
                            <h4>{{ $course->title }}</h4>
                        </a>

                        <h2>{{ $course->questions[$key]->title }}</h2>
                        <p>{{ $course->questions[$key]->description }}</p>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="source">
                        @if ($course->questions[$key]->youtube) <iframe width="450" height="237" src="https://www.youtube.com/embed/{{ $course->questions[$key]->youtube }}" frameborder="0" allowfullscreen></iframe> @endif
                        @if ($course->questions[$key]->images)<img class="source-image" src="{{ $course->questions[$key]->images }}" alt=""> @endif
                    </div>
                </div>
            </div>
        </div>

        @if (! Auth::user())
        <div class="col-sm-12">
            <div class="padding">Please login</div>
        </div>
        @else

        <div class="answer-area">
            <div class="table">
                <div class="table-cell">
                    <div class="container">

                        @include('partials.flash')
                        <h6>Vul hier je antwoord in:</h6>

                        <h4>{{ $course->questions[$key]->title }} @if ($course->questions[$key]->answer->context == $course->questions[$key]->given['answer'])
                            <img src="/img/checked.svg" alt=""> @endif</h4>

                        @if (count($course->questions[$key]->options) > 0)
                        <ol type="A">
                            @foreach ($course->questions[$key]->options as $index => $option)
                            <li>
                                <label>
                                    <input id="answerRadio" type="radio"
                                           value="{{ $index + 1 }}"
                                           name="answer"/>
                                    {{ $option->option }}
                                </label>
                            </li>
                            @endforeach
                        </ol>
                        @else
                        <div class="form-group">
                            <input id="answerInput" type="text"
                                   class="form-control"
                                   value="{{ $course->questions[$key]->given['answer'] }}"
                                   name="answer">
                        </div>
                        @endif

                        <input type="hidden" name="questionId" value="{{ $course->questions[$key]->id }}">
                        <input type="hidden" name="questionIndex" value="{{ $key }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <button type="submit" class="btn btn-primary finish div-center" form="answer-form">Volgende »</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</form>

@endsection
