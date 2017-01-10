@extends('angular')

@section('content')

    <div class="course-edit">
        <div class="container">

            <div class="col-sm-4 side-bar">
                <a class="back" href="/admin">« terug</a>
                <h1>{{ $child->title }}</h1>

                <div class="course-description">
                    <p>{{ $child->description }}</p>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="course-questions">
                    @include('partials.flash')
                    <ul>
                        <form id="delete-child" action="/rest/child/delete" method="post">

                            <input type="hidden" name="toDelete" value="{{ $child->id }}"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        </form>
                    </ul>
                    <button type="submit" class="btn" form="delete-child">
                        Vraag verwijderen
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection
