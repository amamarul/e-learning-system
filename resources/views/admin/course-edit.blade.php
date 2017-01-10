@extends('angular')

@section('content')


<div class="course-edit">
    <div class="container">

        <div class="col-sm-4 side-bar">
            <a class="back" href="/admin">« terug</a>
            <h1>{{ $course->title }}</h1>

            <div class="course-description">
                <p>{{ $course->description }}</p>
            </div>

            <button type="button" class="btn btn-md" data-toggle="modal" data-target="#edit-course-modal">
                Training bewerken
            </button>
        </div>

        <div class="col-sm-8">
            <div class="course-questions">
                @include('partials.flash')
                <ul>
                    @foreach ($course->questions as $idx => $question)
                    <li>
                        <a href="/admin/course/{{$course->id}}/{{$question->id}}">
                            <div class="col-sm-12">
                                <div class="question-title">{{ $idx + 1 }}: {{ $question->title }}</div>
                                <h6>Antwoord: {{ $question->answer->context }}</h6>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#questions-modal">
                    Vraag toevoegen
                </button>
            </div>
        </div>
    </div>
</div>

@include('shared.add-question-modal')
@include('shared.course-edit-modal')
@endsection
