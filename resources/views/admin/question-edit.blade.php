@extends('angular')

@section('content')

    <div class="course-edit">
        <div class="container">

            <div class="col-sm-4 side-bar">
                <a class="back" href="/admin">« terug</a>
                <h1>{{ $question->title }}</h1>

                <div class="course-description">
                    <p>{{ $question->description }}</p>
                </div>

                <button type="button" class="btn btn-md" data-toggle="modal" data-target="#edit-question-modal">
                    Vraag bewerken
                </button>
            </div>

            <div class="col-sm-8">
                <div class="course-questions">
                    @include('partials.flash')
                    <ul>
                        <form id="delete-question" action="/rest/questions/delete" method="post">

                            @if (count($question->options) > 0)
                            <ul>
                                @foreach ($question->options as $option)
                                <li>{{ $option->option }}</li>
                                @endforeach
                            </ul>
                            @endif
                            <input type="hidden" name="toDelete" value="{{ $question->id }}"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        </form>
                    </ul>
                    <button type="submit" class="btn" form="delete-question">
                        Vraag verwijderen
                    </button>
                </div>
            </div>
        </div>
    </div>

@include('shared.course-edit-modal')

@endsection
